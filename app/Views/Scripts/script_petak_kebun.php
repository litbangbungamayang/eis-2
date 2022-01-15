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

  var arrUnit = [];
  var luas_ts_buma = 0.0;
  var luas_ts_cima = 0.0;
  var luas_tr_buma = 0.0;
  var luas_tr_cima = 0.0;
  var luas_tsi_buma = 0.0;
  var luas_tsi_cima = 0.0;

  var lbl_luas_ts_buma = $("#luas_ts_buma");
  var lbl_luas_ts_cima = $("#luas_ts_cima");
  var lbl_luas_ts_bcn = $("#luas_ts_bcn");

  var lbl_luas_tr_buma = $("#luas_tr_buma");
  var lbl_luas_tr_cima = $("#luas_tr_cima");
  var lbl_luas_tr_bcn = $("#luas_tr_bcn");

  var lbl_luas_tsi_buma = $("#luas_tsi_buma");
  var lbl_luas_tsi_cima = $("#luas_tsi_cima");
  var lbl_luas_tsi_bcn = $("#luas_tsi_bcn");

  var lbl_luas_total_buma = $("#luas_total_buma");
  var lbl_luas_total_cima = $("#luas_total_cima");
  var lbl_luas_total_bcn = $("#luas_total_bcn");

  //---------------------------------------//

  function fetchData(){
    let tahun_now = new Date().getFullYear();
    $.getJSON("C_petak_kebun/getGroupingLuas?tahun_giling=" + tahun_now, function(response){
      arrUnit = response;
      refreshData();
    })
  }

  function refreshData(){
    luas_ts_buma = Number(arrUnit.filter(val => val.kode_plant === "7TK1" && val.kepemilikan === "TS-HG")[0].luas) || 0;
    luas_ts_cima = Number(arrUnit.filter(val => val.kode_plant === "7TK2" && val.kepemilikan === "TS-HG")[0].luas) || 0;
    luas_tr_buma = Number(arrUnit.filter(val => val.kode_plant === "7TK1" && val.kepemilikan === "TR-KR")[0].luas) || 0;
    luas_tr_cima = Number(arrUnit.filter(val => val.kode_plant === "7TK2" && val.kepemilikan === "TR-KR")[0].luas) || 0;
    luas_tsi_buma = Number(arrUnit.filter(val => val.kode_plant === "7TK1" && val.kepemilikan === "TS-IP")[0].luas) || 0;

    //---- UPDATING INDICATORS -----------//
    lbl_luas_ts_buma.text(formatting.format(luas_ts_buma) + " ha");
    lbl_luas_ts_cima.text(formatting.format(luas_ts_cima) + " ha");
    lbl_luas_ts_bcn.text(formatting.format(luas_ts_buma + luas_ts_cima) + " ha");

    lbl_luas_tr_buma.text(formatting.format(luas_tr_buma) + " ha");
    lbl_luas_tr_cima.text(formatting.format(luas_tr_cima) + " ha");
    lbl_luas_tr_bcn.text(formatting.format(luas_tr_buma + luas_tr_cima) + " ha");

    lbl_luas_tsi_buma.text(formatting.format(luas_tsi_buma) + " ha");
    lbl_luas_tsi_cima.text(formatting.format(luas_tsi_cima) + " ha");
    lbl_luas_tsi_bcn.text(formatting.format(luas_tsi_buma + luas_tsi_cima) + " ha");

    lbl_luas_total_buma.text(formatting.format(luas_ts_buma + luas_tr_buma + luas_tsi_buma) + " ha");
    lbl_luas_total_cima.text(formatting.format(luas_ts_cima + luas_tr_cima + luas_tsi_cima) + " ha");
    lbl_luas_total_bcn.text(formatting.format(luas_ts_buma + luas_tr_buma + luas_tsi_buma + luas_ts_cima + luas_tr_cima + luas_tsi_cima) + " ha");
    //------------------------------------//

  }

  function defaultLoad(){
    //setInterval(function(){ refreshData() }, 5000);
    fetchData();
  }
</script>
