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
  var lbl_persen_tebu_ditebang_buma = $("#persen_tebu_ditebang_buma");
  var lbl_persen_tebu_ditebang_cima = $("#persen_tebu_ditebang_cima");
  var lbl_persen_tebu_ditebang_bcn = $("#persen_tebu_ditebang_bcn");
  //-----------------------------------------
  var lbl_persen_protas_buma = $("#persen_protas_buma");
  var lbl_persen_protas_cima = $("#persen_protas_cima");
  var lbl_persen_protas_bcn = $("#persen_protas_bcn");
  //-----------------------------------------
  var lbl_persen_gmpg_buma = $("#persen_gmpg_buma");
  var lbl_persen_gmpg_cima = $("#persen_gmpg_cima");
  var lbl_persen_gmpg_bcn = $("#persen_gmpg_bcn");
  //-----------------------------------------
  var lbl_ton_tebu_ditebang_buma = $("#ton_tebu_ditebang_buma");
  var lbl_ton_tebu_ditebang_cima = $("#ton_tebu_ditebang_cima");
  var lbl_ton_tebu_ditebang_bcn = $("#ton_tebu_ditebang_bcn");
  //-----------------------------------------
  var lbl_protas_buma = $("#protas_buma");
  var lbl_protas_cima = $("#protas_cima");
  var lbl_protas_bcn = $("#protas_bcn");
  //-----------------------------------------
  var lbl_gmpg_buma = $("#gmpg_buma");
  var lbl_gmpg_cima = $("#gmpg_cima");
  var lbl_gmpg_bcn = $("#gmpg_bcn");
  //-----------------------------------------
  var pgb_tebu_ditebang_buma = $("#progress_tebu_ditebang_buma");
  var pgb_tebu_ditebang_cima = $("#progress_tebu_ditebang_cima");
  var pgb_tebu_ditebang_bcn = $("#progress_tebu_ditebang_bcn");
  //-----------------------------------------
  var pgb_protas_buma = $("#progress_protas_buma");
  var pgb_protas_cima = $("#progress_protas_cima");
  var pgb_protas_bcn = $("#progress_protas_bcn");
  //-----------------------------------------
  var pgb_gmpg_buma = $("#progress_gmpg_buma");
  var pgb_gmpg_cima = $("#progress_gmpg_cima");
  var pgb_gmpg_bcn = $("#progress_gmpg_bcn");
  //-----------------------------------------
  var arr_data_lhp_buma = [];
  var arr_data_lhp_cima = [];
  var arr_target_buma = [];
  var arr_target_cima = [];
  //---------------------------------------//

  function setColor(value){
    switch (value*100) {
      case value < 25 :
          return "bg-red";
        break;
      case (value >= 25 && value < 50):
        return "bg-";
      default:

    }
  }

  function fetchData(){
    var url = "C_dashboard/getDataLastLhp?pg=buma";
    $.getJSON(url, function(response){
      arr_data_lhp_buma = response[0];
      refreshData();
    })
    url = "C_dashboard/getDataLastLhp?pg=cima";
    $.getJSON(url, function(response){
      arr_data_lhp_cima = response[0];
      refreshData();
    })
    url = "C_kinerja/getTargetKinerja?kat=takmar&pg=buma";
    $.getJSON(url, function(response){
      arr_target_buma = response[0];
      refreshData();
    })
    url = "C_kinerja/getTargetKinerja?kat=takmar&pg=cima";
    $.getJSON(url, function(response){
      arr_target_cima = response[0];
      refreshData();
    })
  }

  function refreshData(){
    //================ UPDATING INDICATORS ====================
    var ton_giling_total_buma = Number(arr_data_lhp_buma.ton_giling_total_sd) || 0;
    var ton_giling_total_cima = Number(arr_data_lhp_cima.ton_giling_total_sd) || 0;
    var ton_giling_total_bcn = ton_giling_total_buma + ton_giling_total_cima;
    var target_tebu_digiling_buma = Number(arr_target_buma.tebu_digiling_total) || 0;
    var target_tebu_digiling_cima = Number(arr_target_cima.tebu_digiling_total) || 0;
    var persen_tebu_digiling_buma = (ton_giling_total_buma)/target_tebu_digiling_buma || 0;
    var persen_tebu_digiling_cima = (ton_giling_total_cima)/target_tebu_digiling_cima || 0;
    var persen_tebu_digiling_bcn = (ton_giling_total_buma + ton_giling_total_cima)/
      (target_tebu_digiling_buma + target_tebu_digiling_cima);

    var protas_buma = (Number(arr_data_lhp_buma.ton_giling_ts_sd)/Number(arr_data_lhp_buma.ha_giling_ts_sd)) || 0;
    var target_protas_buma = Number(arr_target_buma.protas_ts) || 0;
    var persen_protas_buma = protas_buma/target_protas_buma || 0;
    var protas_cima = (Number(arr_data_lhp_cima.ton_giling_ts_sd)/Number(arr_data_lhp_cima.ha_giling_ts_sd)) || 0;
    var target_protas_cima = Number(arr_target_cima.protas_ts) || 0;
    var persen_protas_cima = protas_cima/target_protas_cima || 0;
    var protas_bcn = ((Number(arr_data_lhp_buma.ton_giling_ts_sd) + Number(arr_data_lhp_cima.ton_giling_ts_sd))/
      (Number(arr_data_lhp_buma.ha_giling_ts_sd) + Number(arr_data_lhp_cima.ha_giling_ts_sd))) || 0;
    var target_protas_bcn = (Number(arr_target_buma.tebu_digiling_ts) + Number(arr_target_cima.tebu_digiling_ts))/
      (Number(arr_target_buma.luas_digiling_ts) + Number(arr_target_cima.luas_digiling_ts)) || 0;
    var persen_protas_bcn = protas_bcn/target_protas_bcn || 0;

    var gmpg_buma = Number(arr_data_lhp_buma.gula_pg_total_sd)|| 0;
    var target_gmpg_buma = Number(arr_target_buma.gula_ts) + Number(arr_target_buma.gula_ts_eks_tr) || 0;
    var persen_gmpg_buma = gmpg_buma/target_gmpg_buma || 0;
    var gmpg_cima = Number(arr_data_lhp_cima.gula_pg_total_sd)|| 0;
    var target_gmpg_cima = Number(arr_target_cima.gula_ts) + Number(arr_target_cima.gula_ts_eks_tr) || 0;
    var persen_gmpg_cima = gmpg_cima/target_gmpg_cima || 0;
    var gmpg_bcn = gmpg_buma + gmpg_cima || 0;
    var target_gmpg_bcn = target_gmpg_buma + target_gmpg_cima || 0;
    var persen_gmpg_bcn = gmpg_bcn/target_gmpg_bcn || 0;

    //====== BUMA ===============
    lbl_persen_tebu_ditebang_buma.text(formatting.format(
      persen_tebu_digiling_buma * 100) + '%');
    lbl_ton_tebu_ditebang_buma.text(formatting.format(ton_giling_total_buma) + ' ton / ' +
      formatting.format(target_tebu_digiling_buma) + ' ton');
    pgb_tebu_ditebang_buma.css('width', persen_tebu_digiling_buma*100 + '%').attr('aria-valuenow', persen_tebu_digiling_buma*100);
    pgb_tebu_ditebang_buma.css('background-color', "hsl(" + (persen_tebu_digiling_buma*150) + ",50%,50%)");

    lbl_persen_protas_buma.text(formatting.format(persen_protas_buma * 100) + '%');
    lbl_protas_buma.text(formatting.format(protas_buma) + ' ton/ha dari ' + formatting.format(target_protas_buma) + ' ton/ha');
    pgb_protas_buma.css('width', persen_protas_buma*100 + '%').attr('aria_valuenow', persen_protas_buma*100);
    pgb_protas_buma.css('background-color', "hsl(" + (persen_protas_buma*150) + ",50%,50%)");

    lbl_persen_gmpg_buma.text(formatting.format(persen_gmpg_buma * 100) + '%');
    lbl_gmpg_buma.text(formatting.format(gmpg_buma) + ' ton dari ' + formatting.format(target_gmpg_buma) + ' ton');
    pgb_gmpg_buma.css('width', persen_gmpg_buma*100 + '%').attr('aria_valuenow', persen_gmpg_buma*100);
    pgb_gmpg_buma.css('background-color', "hsl(" + (persen_gmpg_buma*150) + ",50%,50%)");
    //===========================
    //====== CIMA ===============
    lbl_persen_tebu_ditebang_cima.text(formatting.format(
      persen_tebu_digiling_cima * 100) + '%');
    lbl_ton_tebu_ditebang_cima.text(formatting.format(ton_giling_total_cima) + ' ton / ' +
      formatting.format(target_tebu_digiling_cima) + ' ton');
    pgb_tebu_ditebang_cima.css('width', persen_tebu_digiling_cima*100 + '%').attr('aria-valuenow', persen_tebu_digiling_cima*100);
    pgb_tebu_ditebang_cima.css('background-color', "hsl(" + (persen_tebu_digiling_cima*150) + ",50%,50%)");
    lbl_persen_protas_cima.text(formatting.format(persen_protas_cima * 100) + '%');
    lbl_protas_cima.text(formatting.format(protas_cima) + ' ton/ha dari ' + formatting.format(target_protas_cima) + ' ton/ha');
    pgb_protas_cima.css('width', persen_protas_cima*100 + '%').attr('aria_valuenow', persen_protas_cima*100);
    pgb_protas_cima.css('background-color', "hsl(" + (persen_protas_cima*150) + ",50%,50%)");

    lbl_persen_gmpg_cima.text(formatting.format(persen_gmpg_cima * 100) + '%');
    lbl_gmpg_cima.text(formatting.format(gmpg_cima) + ' ton dari ' + formatting.format(target_gmpg_cima) + ' ton');
    pgb_gmpg_cima.css('width', persen_gmpg_cima*100 + '%').attr('aria_valuenow', persen_gmpg_cima*100);
    pgb_gmpg_cima.css('background-color', "hsl(" + (persen_gmpg_cima*150) + ",50%,50%)");
    //===========================
    //====== BCN ================
    lbl_persen_tebu_ditebang_bcn.text(formatting.format(
      (persen_tebu_digiling_bcn * 100) || 0) + '%');
    lbl_ton_tebu_ditebang_bcn.text(formatting.format(ton_giling_total_bcn) + ' ton / ' +
      formatting.format(target_tebu_digiling_buma + target_tebu_digiling_cima) + ' ton');
    pgb_tebu_ditebang_bcn.css('width', persen_tebu_digiling_bcn*100 + '%').attr('aria-valuenow', persen_tebu_digiling_bcn*100);
    pgb_tebu_ditebang_bcn.css('background-color', "hsl(" + (persen_tebu_digiling_bcn*150) + ",50%,50%)");
    lbl_persen_protas_bcn.text(formatting.format(persen_protas_bcn * 100) + '%');
    lbl_protas_bcn.text(formatting.format(protas_bcn) + ' ton/ha dari ' + formatting.format(target_protas_bcn) + ' ton/ha');
    pgb_protas_bcn.css('width', persen_protas_bcn*100 + '%').attr('aria_valuenow', persen_protas_bcn*100);
    pgb_protas_bcn.css('background-color', "hsl(" + (persen_protas_bcn*150) + ",50%,50%)");
    lbl_persen_gmpg_bcn.text(formatting.format(persen_gmpg_bcn * 100) + '%');
    lbl_gmpg_bcn.text(formatting.format(gmpg_bcn) + ' ton dari ' + formatting.format(target_gmpg_bcn) + ' ton');
    pgb_gmpg_bcn.css('width', persen_gmpg_bcn*100 + '%').attr('aria_valuenow', persen_gmpg_bcn*100);
    pgb_gmpg_bcn.css('background-color', "hsl(" + (persen_gmpg_bcn*150) + ",50%,50%)");
    //===========================
    //=========================================================

  }

  function defaultLoad(){
    //setInterval(function(){ refreshData() }, 5000);
    fetchData();
  }
</script>
