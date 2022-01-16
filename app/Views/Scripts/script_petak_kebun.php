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

  $("#tblPetak").DataTable({
    bFilter: true,
    bPaginate: true,
    bSort: false,
    bInfo: false,
    select: true,
    dom: '<"row"<"labelTahunGiling"><"cbxTahunGiling">f>t<"spacer">pl',
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
    fetchData();
  }
</script>
