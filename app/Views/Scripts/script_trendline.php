<script>
window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";

//==== VARIABLES DECLARATION ==========

var cbx_jenis_data = $("#sel_jenis_data");
var cbx_pg = $("#sel_pg");
var btn_tes = $("#btn_tes");
var dtp_tgl_awal = $("#dtp_tgl_awal");
var dtp_tgl_akhir = $("#dtp_tgl_akhir");
var jenis_data_terpilih_1 = [];
var jenis_data_1 = [{
      value: 'ton_tebang_total', text: 'Tebu Masuk'
    },{
      value: 'ton_giling_total', text: 'Tebu Digiling'
    },{
      value: 'sisa_tebu', text: 'Sisa Tebu'
    },{
      value: 'kis', text: 'Kap. Inklusif'
    },{
      value: 'kes', text: 'Kap. Eksklusif'
    }
  ];
var data_grafik_1 = new Map();
var label_grafik = [];
//=====================================

//==== GRAPH OPTIONS ==================

var grafik_options = {
  chart: {
    id: "hourly-cima-id",
    type: "line",
    fontFamily: 'inherit',
    height: 250,
    parentHeightOffset: 0,
    toolbar: {
      show: false,
    },
    animations: {
      enabled: false
    },
    stacked: false,
    zoom: {
      enabled: true
    },
    toolbar: {
      show: true
    }
  },
  stroke: {
    width: 2,
    curve: 'smooth'
  },
  plotOptions: {
    bar: {
      columnWidth: '50%',
    }
  },
  dataLabels: {
    enabled: false,
  },
  fill: {
    opacity: 0.8,
  },
  series: [
    {
      name: "testcima1",
      data: []
    }
  ],
  grid: {
    padding: {
      top: -20,
      right: 0,
      left: -4,
      bottom: -4
    },
    strokeDashArray: 4,
    xaxis: {
      lines: {
        show: true
      }
    },
  },
  markers: {
    size: 5,
    hover: {
      size: 8
    }
  },
  xaxis: {
    labels: {
      padding: 0,
      style: {
        fontSize: '10px'
      }
    },
    tooltip: {
      enabled: false
    },
    axisBorder: {
      show: false,
    },
    type: 'datetime',
  },
  noData: {
    text: "Tidak ada data"
  },
  yaxis: {
    labels: {
      padding: 4,
      style: {
        fontSize: '10px'
      }
    },
  },
  labels: ['06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','00','01','02','03','04','05'],
  //colors: ["#69c41f", "#206bc4", "#206bc4",''],
  legend: {
    show: true,
  }
};

var grafik_1 = new ApexCharts(document.querySelector("#grafik_1"),
    grafik_options
  );
grafik_1.render();

//=====================================

function initCbxJenisData(){
  cbx_jenis_data.selectize({
    create: false,
    sortField: "text",
    onChange: function(value){

    }
  });
  cbx_jenis_data[0].selectize.addOption(jenis_data_1);
}

function initCbxPg(){
  cbx_pg.selectize({
    create: false,
    sortField: "text",
    onChange: function(value){

    }
  });
  cbx_pg[0].selectize.addOption([{
        value: 'buma', text: 'Bungamayang'
      },{
        value: 'cima', text: 'Cinta Manis'
      }
    ]
  )
}

function cekAjax(){
  $.ajax({
    url: js_base_url + "C_trendline/tes",
    type: "POST",
    dataType: "json",
    //data:"payload=" + JSON.stringify(cbx_jenis_data[0].selectize.items),
    data:{
      payload: JSON.stringify(cbx_jenis_data[0].selectize.items)
    },
    success: function(data){
      //window.location.href = js_base_url + "Lab_ak_dataanalisa";
      //location.assign(js_base_url + "Lab_ak_dataanalisa");
      //window.location.assign(data);
      window.location.href = data;
    }
  })
}

function getDataGrafik1(){
  jenis_data_terpilih_1 = cbx_jenis_data[0].selectize.items;
  $.ajax({
    url: js_base_url + "C_trendline/getDataGrafik1",
    type: "POST",
    dataType: "json",
    data:{
      field: jenis_data_terpilih_1, //TODO kayaknya nggak kepake
      pg: cbx_pg.val(), //TODO ganti ke combo box
      tgl_awal: dtp_tgl_awal.val(),
      tgl_akhir: dtp_tgl_akhir.val()
    },
    success: function(data){
      data_grafik_1 = new Map();
      for(var nama_kolom in data[0]){
        //console.log(nama_kolom);
      }
      for(var i = 0; i < jenis_data_terpilih_1.length; i++){
        var nama_series = jenis_data_1.filter((e)=>e.value === jenis_data_terpilih_1[i]);
        //console.log(nama_series[0].text);
        var baris_data = [];
        for(var j = 0; j < data.length; j++){
          label_grafik[j] = data[j].tgl_giling;
          for(var nama_kolom in data[j]){
            if(nama_kolom === jenis_data_terpilih_1[i]){
              baris_data[j] = data[j][nama_kolom];
            }
          }
          data_grafik_1.set(nama_series[0].text,baris_data);
        }
      }
      console.log(data_grafik_1);
      grafik_1.updateOptions({
        labels: label_grafik
      });
      render_grafik_1 = Array.from(data_grafik_1, ([name,data]) => ({name,data}));
      grafik_1.updateSeries(render_grafik_1);
    }
  })
}

btn_tes.on("click", function(){
  //console.log(cbx_jenis_data[0].selectize.items);
  //cekAjax();
  getDataGrafik1();
})

function defaultLoad(){
  initCbxJenisData();
  initCbxPg();
}

</script>
