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

  var cbx_tahun_giling = $("#sel_tahunGiling");
  var cbx_kebun = $("#sel_kebun");
  var txt_cari = $("#txt_cari");
  var lbl_deskripsi_blok = $("#lbl_deskripsi_blok");
  var lbl_kategori = $("#lbl_kategori");
  var lbl_varietas = $("#lbl_varietas");
  var lbl_kepemilikan = $("#lbl_kepemilikan");
  var lbl_kode_blok = $("#kode_blok");
  var btn_detail_petak = $("#btn_detail_petak");
  var selectedPetak = "";
  var btn_backToTop = $("#btn_backToTop");

  var tbl_petak = $("#tblPetak").DataTable({
    bFilter: true,
    bPaginate: true,
    bSort: false,
    bInfo: false,
    select: true,
    scrollY: false,
    dom: "<'mb-5' t>lp",
    ajax: {
      url: js_base_url + "C_petak_kebun/getAllPetak?tahun_giling=2022&pg=7TK",
      dataSrc: ""
    },
    columns : [
      {data: "deskripsi_blok"},
      {data: "mature"},
      {data: "luas_tanam"}
    ]
  })

  $("#tblPetak").on("click", "tbody tr", function(){
    //console.log($("#tblPetak").DataTable().row(this).data());
    let selectedData = $("#tblPetak").DataTable().row(this).data();
    lbl_deskripsi_blok.text(selectedData.deskripsi_blok);
    lbl_kategori.text(selectedData.status_blok);
    lbl_varietas.text(selectedData.nama_varietas);
    lbl_kepemilikan.text(selectedData.kepemilikan);
    lbl_kode_blok.text(selectedData.kode_blok);
    btn_detail_petak.attr("href",js_base_url + "detail_petak?kode_blok=" + selectedData.kode_blok);
  })
  //---------------------------------------//

  function initCombo(){
    txt_cari.on('input', function(){
      tbl_petak.columns(0).search(txt_cari.val()).draw();
    })
    cbx_tahun_giling.selectize({
      create: false,
      sortField: "text",
      onChange: function(value){
        tbl_petak.ajax.url(js_base_url + "C_petak_kebun/getAllPetak?tahun_giling=" +
          value + "&pg=" + cbx_kebun.val()).load();
      }
    });
    var tahun_ini = new Date().getFullYear();
    for (let i = -2; i < 3; i++){
      cbx_tahun_giling[0].selectize.addOption({value: tahun_ini + i, text: tahun_ini + i});
    }
    cbx_tahun_giling[0].selectize.setValue(tahun_ini,false);
    cbx_kebun.selectize({
      create: false,
      sortField: "text",
      onChange: function(value){
        tbl_petak.ajax.url(js_base_url + "C_petak_kebun/getAllPetak?tahun_giling=" +
          cbx_tahun_giling.val() + "&pg=" + value).load();
      }
    });
    cbx_kebun[0].selectize.addOption({value: "7TK1", text: "BUNGAMAYANG"});
    cbx_kebun[0].selectize.addOption({value: "7TK2", text: "CINTA MANIS"});
    cbx_kebun[0].selectize.setValue("7TK1", false);
  }

  function scrollFunction(){
    if (document.body.scrollTop > 20 ||document.documentElement.scrollTop > 20){
        //mybutton.style.display = "block";
        btn_backToTop.css('display', '');
        btn_backToTop.onClick = function(){
          alert("Clicked");
        }
      } else {
        btn_backToTop.css('display', 'none');
        btn_backToTop.onClick = function(){
          alert("Clicked");
        }
      }
  }

  function backToTop() {

  }


  //---------------------------------------//

  function fetchData(){
    /*
    $.getJSON("C_petak_kebun/getAllPetak?tahun_giling=2022&pg=7TK", function(response){
      console.log(response);
      refreshData();
    })
    */
  }

  function refreshData(){

  }

  function defaultLoad(){
    //setInterval(function(){ refreshData() }, 5000);
    window.onscroll = function(){
      //---- TO BE IMPLEMENTED ------//
      //console.log(window.scrollY);
      //scrollFunction();
    }
    fetchData();
    initCombo();
  }
</script>
