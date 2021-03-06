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

  var lbl_deskripsi_blok = $("#lbl_deskripsi_blok");
  var lbl_kategori = $("#lbl_kategori");
  var lbl_varietas = $("#lbl_varietas");
  var lbl_kepemilikan = $("#lbl_kepemilikan");
  var lbl_kode_blok = $("#kode_blok");
  var btn_detail_petak = $("#btn_detail_petak");
  var selectedPetak = "";
  var btn_backToTop = $("#btn_backToTop");

  $("#tblPetak").DataTable({
    bFilter: true,
    bPaginate: true,
    bSort: false,
    bInfo: false,
    select: true,
    scrollY: false,
    dom: "lf<'mb-5' t>p",
    ajax: {
      url: js_base_url + "C_petak_kebun/getAllPetak?tahun_giling=2022&pg=7TK",
      dataSrc: ""
    },
    columns : [
      {
        data: "no",
        render: function(data, type, row, meta){
          return meta.row + 1;
        }
      },
      {data: "deskripsi_blok"},
      {data: "luas_tanam"},
      {data: "nama_varietas"}
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
  }
</script>
