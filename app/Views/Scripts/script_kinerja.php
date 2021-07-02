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
  var lbl_ton_tebu_ditebang_buma = $("#ton_tebu_ditebang_buma");
  var lbl_ton_tebu_ditebang_cima = $("#ton_tebu_ditebang_cima");
  var lbl_ton_tebu_ditebang_bcn = $("#ton_tebu_ditebang_bcn");
  var pgb_tebu_ditebang_buma = $("#progress_tebu_ditebang_buma");
  var pgb_tebu_ditebang_cima = $("#progress_tebu_ditebang_cima");
  var pgb_tebu_ditebang_bcn = $("#progress_tebu_ditebang_bcn");
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

  function refreshData(){
    var url = "C_dashboard/getDataLastLhp?pg=buma";
    $.getJSON(url, function(response){
      arr_data_lhp_buma = response[0];
    })
    url = "C_dashboard/getDataLastLhp?pg=cima";
    $.getJSON(url, function(response){
      arr_data_lhp_cima = response[0];
    })
    url = "C_kinerja/getTargetKinerja?kat=takmar&pg=buma";
    $.getJSON(url, function(response){
      arr_target_buma = response[0];
    })
    url = "C_kinerja/getTargetKinerja?kat=takmar&pg=cima";
    $.getJSON(url, function(response){
      arr_target_cima = response[0];
    })

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
    //====== BUMA ===============
    lbl_persen_tebu_ditebang_buma.text(formatting.format(
      persen_tebu_digiling_buma * 100) + '%');
    lbl_ton_tebu_ditebang_buma.text(formatting.format(ton_giling_total_buma) + ' ton / ' +
      formatting.format(target_tebu_digiling_buma) + ' ton');
    pgb_tebu_ditebang_buma.css('width', persen_tebu_digiling_buma*100 + '%').attr('aria-valuenow', persen_tebu_digiling_buma*100);
    pgb_tebu_ditebang_buma.css('background-color', "hsl(" + (persen_tebu_digiling_buma*150) + ",50%,50%)");
    //===========================
    //====== CIMA ===============
    lbl_persen_tebu_ditebang_cima.text(formatting.format(
      persen_tebu_digiling_cima * 100) + '%');
    lbl_ton_tebu_ditebang_cima.text(formatting.format(ton_giling_total_cima) + ' ton / ' +
      formatting.format(target_tebu_digiling_cima) + ' ton');
    pgb_tebu_ditebang_cima.css('width', persen_tebu_digiling_cima*100 + '%').attr('aria-valuenow', persen_tebu_digiling_cima*100);
    pgb_tebu_ditebang_cima.css('background-color', "hsl(" + (persen_tebu_digiling_cima*150) + ",50%,50%)");
    //===========================
    //====== BCN ================
    lbl_persen_tebu_ditebang_bcn.text(formatting.format(
      (persen_tebu_digiling_bcn * 100) || 0) + '%');
    lbl_ton_tebu_ditebang_bcn.text(formatting.format(ton_giling_total_bcn) + ' ton / ' +
      formatting.format(target_tebu_digiling_buma + target_tebu_digiling_cima) + ' ton');
    pgb_tebu_ditebang_bcn.css('width', persen_tebu_digiling_bcn*100 + '%').attr('aria-valuenow', persen_tebu_digiling_bcn*100);
    pgb_tebu_ditebang_bcn.css('background-color', "hsl(" + (persen_tebu_digiling_bcn*150) + ",50%,50%)");
    //===========================
    //=========================================================
  }
  function defaultLoad(){
    refreshData();
    setInterval(function(){ refreshData() }, 5000);
  }
  refreshData();
</script>
