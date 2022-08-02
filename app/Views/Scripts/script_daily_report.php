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
  var dtp_tgl_lhp = $("#dtp_tgl_lhp");
  var tgl_last_lhp_buma = new Date();
  //=================================

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

  dtp_tgl_lhp.on("change.datetimepicker", function(){
    let selected_date = dtp_tgl_lhp.val();
    var url_3 = js_base_url + "C_dashboard/getLhpByDate?pg=buma&tgl=" + selected_date;
    $.getJSON(url_3, function(response){
      if (response !== null){
        //tgl_last_lhp_buma = new Date(response[0].last_lhp);
      }
    })
  })

  function defaultLoad(){

  }
</script>
