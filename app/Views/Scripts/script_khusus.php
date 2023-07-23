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
  var tbl_data = $("#dataText");
  var dtp_tgl = $("#dtp_tgl");
  //=================================

  function defaultLoad(){
    var tabel_data;
    dtp_tgl.change(function(){
      var tgl = dtp_tgl.val();
      var url = js_base_url + "C_kinerja/getDataKhusus?tgl=" + tgl;
      var url_sd = js_base_url + "C_kinerja/getDataKhususSd?tgl=" + tgl;
      var dataKhusus, dataKhususSd;
      var ton_1 = 0;
      var hablur_1 = 0;
      var ton_1_sd = 0;
      var hablur_1_sd = 0;
      var ton_2 = 0;
      var hablur_2 = 0;
      var ton_2_sd = 0;
      var hablur_2_sd = 0;
      var ton_3 = 0;
      var hablur_3 = 0;
      var ton_3_sd = 0;
      var hablur_3_sd = 0;
      var ton_4 = 0;
      var hablur_4 = 0;
      var ton_4_sd = 0;
      var hablur_4_sd = 0;
      var ton_tubu = 0;
      var hablur_tubu = 0;
      var ton_tubu_sd = 0;
      var hablur_tubu_sd = 0;
      var ton_tr = 0;
      var hablur_tr = 0;
      var ton_tr_sd = 0;
      var hablur_tr_sd = 0;
      var ton_total = 0;
      var hablur_total = 0;
      var ton_total_sd = 0;
      var hablur_total_sd = 0;
      var ton_ts = 0;
      var hablur_ts = 0;
      var ton_ts_sd = 0;
      var hablur_ts_sd = 0;
      $.getJSON(url, function(response){
        var dataKhusus = response;
        $.getJSON(url_sd, function(response){
          var dataKhususSd = response;
          tabel_data = '';
          if(dataKhusus.length > 1){
            dataKhusus.forEach((item, index) => {
              ton_total = ton_total + parseFloat(dataKhusus[index].ton_tebu);
              hablur_total = hablur_total + parseFloat(dataKhusus[index].hablur);
              ton_total_sd = ton_total_sd + parseFloat(dataKhususSd[index].ton_tebu);
              hablur_total_sd = hablur_total_sd + parseFloat(dataKhususSd[index].hablur);
              switch(dataKhusus[index].rayon){
                case "1":
                  ton_1 = ton_1 + parseFloat(dataKhusus[index].ton_tebu);
                  hablur_1 = hablur_1 + parseFloat(dataKhusus[index].hablur);
                  ton_1_sd = ton_1_sd + parseFloat(dataKhususSd[index].ton_tebu);
                  hablur_1_sd = hablur_1_sd + parseFloat(dataKhususSd[index].hablur);
                  break;
                case "2":
                  ton_2 = ton_2 + parseFloat(dataKhusus[index].ton_tebu);
                  hablur_2 = hablur_2 + parseFloat(dataKhusus[index].hablur);
                  ton_2_sd = ton_2_sd + parseFloat(dataKhususSd[index].ton_tebu);
                  hablur_2_sd = hablur_2_sd + parseFloat(dataKhususSd[index].hablur);
                  break;
                case "3":
                  ton_3 = ton_3 + parseFloat(dataKhusus[index].ton_tebu);
                  hablur_3 = hablur_3 + parseFloat(dataKhusus[index].hablur);
                  ton_3_sd = ton_3_sd + parseFloat(dataKhususSd[index].ton_tebu);
                  hablur_3_sd = hablur_3_sd + parseFloat(dataKhususSd[index].hablur);
                  break;
                case "4":
                  ton_4 = ton_4 + parseFloat(dataKhusus[index].ton_tebu);
                  hablur_4 = hablur_4 + parseFloat(dataKhusus[index].hablur);
                  ton_4_sd = ton_4_sd + parseFloat(dataKhususSd[index].ton_tebu);
                  hablur_4_sd = hablur_4_sd + parseFloat(dataKhususSd[index].hablur);
                  break;
                case "T":
                  ton_tubu = ton_tubu + parseFloat(dataKhusus[index].ton_tebu);
                  hablur_tubu = hablur_tubu + parseFloat(dataKhusus[index].hablur);
                  ton_tubu_sd = ton_tubu_sd + parseFloat(dataKhususSd[index].ton_tebu);
                  hablur_tubu_sd = hablur_tubu_sd + parseFloat(dataKhususSd[index].hablur);
                  break;
                case "TR":
                  ton_tr = ton_tr + parseFloat(dataKhusus[index].ton_tebu);
                  hablur_tr = hablur_tr + parseFloat(dataKhusus[index].hablur);
                  ton_tr_sd = ton_tr_sd + parseFloat(dataKhususSd[index].ton_tebu);
                  hablur_tr_sd = hablur_tr_sd + parseFloat(dataKhususSd[index].hablur);
                  break;
              }
              tabel_data = tabel_data + `
                <tr>
                  <td style="text-align:left;">` + dataKhusus[index].afdeling + `</td>
                  <td style="text-align:right;">` +  formatting.format((Number(dataKhusus[index].rend_rata2)))+ `</td>
                  <td style="text-align:right;">` +  formatting.format((Number(dataKhususSd[index].rend_rata2)))+ `</td>
                <tr>
              `;
              switch(dataKhusus[index].afdeling){
                case "AFD-04":
                  tabel_data = tabel_data + `
                  <tr style="background-color: #e8e7e6">
                    <td style="text-align:left;">WIL. 1</td>
                    <td style="text-align:right;">` + formatting.format((Number(hablur_1)/Number(ton_1))) + `</td>
                    <td style="text-align:right;">` +  formatting.format((Number(hablur_1_sd)/Number(ton_1_sd))) + `</td>
                  <tr>`;
                  break;
                case "AFD-06":
                  tabel_data = tabel_data + `
                  <tr style="background-color: #e8e7e6">
                    <td style="text-align:left;">WIL. 2</td>
                    <td style="text-align:right;">` + formatting.format((Number(hablur_2)/Number(ton_2))) + `</td>
                    <td style="text-align:right;">` +  formatting.format((Number(hablur_2_sd)/Number(ton_2_sd))) + `</td>
                  <tr>`;
                  break;
                case "AFD-08":
                  tabel_data = tabel_data + `
                  <tr style="background-color: #e8e7e6">
                    <td style="text-align:left;">WIL. 3</td>
                    <td style="text-align:right;">` + formatting.format((Number(hablur_3)/Number(ton_3))) + `</td>
                    <td style="text-align:right;">` +  formatting.format((Number(hablur_3_sd)/Number(ton_3_sd))) + `</td>
                  <tr>`;
                  break;
                case "AFD-10":
                  tabel_data = tabel_data + `
                  <tr style="background-color: #e8e7e6">
                    <td style="text-align:left;">WIL. 4</td>
                    <td style="text-align:right;">` + formatting.format((Number(hablur_4)/Number(ton_4))) + `</td>
                    <td style="text-align:right;">` +  formatting.format((Number(hablur_4_sd)/Number(ton_4_sd))) + `</td>
                  <tr>`;
                  break;
                case "AFD-14":
                  tabel_data = tabel_data + `
                  <tr style="background-color: #e8e7e6">
                    <td style="text-align:left;">WIL. TR</td>
                    <td style="text-align:right;">` + formatting.format((Number(hablur_tr)/Number(ton_tr))) + `</td>
                    <td style="text-align:right;">` +  formatting.format((Number(hablur_tr_sd)/Number(ton_tr_sd))) + `</td>
                  <tr>`;
                  break;
              }
            })
            ton_ts = ton_1 + ton_2 + ton_3 + ton_4;
            ton_ts_sd = ton_1_sd + ton_2_sd + ton_3_sd + ton_4_sd;
            hablur_ts = hablur_1 + hablur_2 + hablur_3 + hablur_4;
            hablur_ts_sd = hablur_1_sd + hablur_2_sd + hablur_3_sd + hablur_4_sd;
            tabel_data = tabel_data + `
              <tr style="background-color: #bfff09">
                <td style="text-align:left;"> TOTAL TS</td>
                <td style="text-align:right;">` +  formatting.format((Number(hablur_ts)/Number(ton_ts)))+ `</td>
                <td style="text-align:right;">` +  formatting.format((Number(hablur_ts_sd)/Number(ton_ts_sd)))+ `</td>
              <tr>
            `;
            tabel_data = tabel_data + `
              <tr style="background-color: #bfff00">
                <td style="text-align:left;"> TOTAL</td>
                <td style="text-align:right;">` +  formatting.format((Number(hablur_total)/Number(ton_total)))+ `</td>
                <td style="text-align:right;">` +  formatting.format((Number(hablur_total_sd)/Number(ton_total_sd)))+ `</td>
              <tr>
            `;
          }
          tbl_data.html(tabel_data);
        })
      })
    })
  }
</script>
