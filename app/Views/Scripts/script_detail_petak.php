<script>
  window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";
  const bulan = ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGT", "SEP", "OKT", "NOV", "DES"];
  const formatOptions = {maximumFractionDigits: 2, minimumFractionDigits: 2};
  const formatting = new Intl.NumberFormat('id-UK', formatOptions);
  function convertArrayToNumber(arrToConvert){
    if (Array.isArray(arrToConvert)){
      var arrResult = [];
      for (var i = 0; i < arrToConvert.length; i++){
        if (arrToConvert[i] !== null){
          arrResult[i] = parseFloat(parseFloat(arrToConvert[i]).toFixed(2));
        } else {
          arrResult[i] = null;
        }
      }
      return arrResult;
    } else {
      return null;
    }
  }


  //------- VARIABLES DECLARATION ---------//
  var lblKodeBlok = $("#kode_blok");
  var kode_blok;
  var card_topCard = $("#top_card");
  var cardPeta = $("#card_peta");
  var txtAffKebun = $("#txtAffKebun");
  var txtTonTebang = $("#txtTonTebang");
  var txtProtas = $("#txtProtas");
  var txtAwalTebang = $("#txtAwalTebang");
  var txtAkhirTebang = $("#txtAkhirTebang");
  var txtLamaTebang = $("#txtLamaTebang");
  //---------------------------------------//
  function setFixedTop(){
    if (window.scrollY > 220){
      //alert("Munculkan");
      //top_card.classList.add("fixed-top");
    } else {
      if (window.scrollY < 100){
        //top_card.classList.remove("fixed-top");
      }
    }
  }
  //---------------------------------------//

  function loadPeta(){
    var map = L.map('map');
    cardPeta[0].addEventListener('shown.bs.collapse', function () {
      map.invalidateSize();
      const googleSat = L.gridLayer.googleMutant({
    		type: "satellite", // valid values are 'roadmap', 'satellite', 'terrain' and 'hybrid'
    	});
      var gpx_url = "<? echo base_url(); ?>"+"/public/assets/gpx/tes1.gpx";
      const gpx_obj = new L.GPX(gpx_url, {
          async: true,
          marker_options: {
            startIconUrl: '',
            endIconUrl: '',
            shadowUrl: ''
          }
        }
      ).on('loaded', function(e) {
        var map_gpx = e.target;
        map.fitBounds(map_gpx.getBounds());
      });
      //drawing layer------------------------------------

      //-------------------------------------------
      googleSat.addTo(map);
      gpx_obj.addTo(map);
      var baseMap = {"Google Sat": googleSat};
      var overlayMap = {
        "Petak Kebun": gpx_obj,
        "Custom": drawingLayer
      };
      L.control.layers(baseMap, overlayMap).addTo(map);
    });
  }

  function fetchData(){
    $("#dataTaksasi").DataTable({
      bFilter: true,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      select: true,
      dom: 'tpl',
      ajax: {
        url: js_base_url + "C_petak_kebun/getTaksasiFromKodePetak?kode_blok=" + kode_blok,
        dataSrc: ""
      },
      columns : [
        {
          data: "no",
          render: function(data, type, row, meta){
            return meta.row + 1;
          }
        },
        {data: "jenis_taksasi"},
        {data: "tgl_taksasi"},
        {
          data: "taksasi_ton_tebu",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {
          data: "taksasi_protas",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
      ]
    });
    $("#dataPekerjaan").DataTable({
      bFilter: true,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      select: true,
      dom: 'tpl',
      ajax: {
        url: js_base_url + "C_petak_kebun/getPekerjaanFromKodePetak?kode_blok=" + kode_blok,
        dataSrc: ""
      },
      columns : [
        {
          data: "no",
          render: function(data, type, row, meta){
            return meta.row + 1;
          }
        },
        {data: "nama_pekerjaan"},
        {
          data: "kuanta_pekerjaan",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {data: "tanggal_pekerjaan"}
      ]
    })
    $("#dataAnalisaKemasakan").DataTable({
      bFilter: true,
      bPaginate: true,
      bSort: false,
      bInfo: false,
      select: true,
      dom: 'tpl',
      ajax: {
        url: js_base_url + "C_petak_kebun/getAnalisaKemasakanFromKodePetak?kode_blok=" + kode_blok,
        dataSrc: ""
      },
      columns : [
        {
          data: "no",
          render: function(data, type, row, meta){
            return meta.row + 1;
          }
        },
        {data: "ronde"},
        {data: "tgl_analisa"},
        {
          data: "panjang",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {
          data: "ruas",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {
          data: "diameter",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {
          data: "kgPerMeter",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {
          data: "fk",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {
          data: "kp",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
        {
          data: "kdt",
          className: "dt-right",
          render: function(data, type, row, meta){
            return (parseFloat(data)).toLocaleString(undefined, {maximumFractionDigits:2});
          },
        },
      ]
    })
    $.getJSON(js_base_url + "C_petak_kebun/getDataProduksiPetak?kode_blok=" + kode_blok, function(response){
      if (response !== null){
        console.log(response[0]);
        if(response[0].aff_tebang == 0){
          txtAffKebun.className = "badge bg-red";
          txtAffKebun[0].textContent = "BELUM AFF";
        } else {
          txtAffKebun.className = "badge bg-green";
          txtAffKebun[0].textContent = "SUDAH AFF";
        }
        txtTonTebang[0].textContent = response[0].total_tebu;
        txtProtas[0].textContent = response[0].produktivitas;
        txtAwalTebang[0].textContent = response[0].awal_tebang;
        txtAkhirTebang[0].textContent = response[0].akhir_tebang;
        txtLamaTebang[0].textContent = response[0].lama_tebang;
      }
    });
  }

  function refreshData(){

  }

  function defaultLoad(){
    //setInterval(function(){ refreshData() }, 5000);
    window.onscroll = function(){
      setFixedTop();
    }
    kode_blok = lblKodeBlok.html();
    fetchData();
    loadPeta();
  }
</script>
