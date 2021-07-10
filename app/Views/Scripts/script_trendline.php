<script>
window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";

//==== VARIABLES DECLARATION ==========

var cbx_jenis_data = $("#sel_jenis_data");
var cbx_jenis_data_2 = $("#sel_jenis_data_2");
var cbx_pg = $("#sel_pg");
var btn_tes = $("#btn_tes");
var dtp_tgl_awal = $("#dtp_tgl_awal");
var dtp_tgl_akhir = $("#dtp_tgl_akhir");
var jenis_data_terpilih_1 = [];
var jenis_data_terpilih_2 = [];
var jenis_data = [{
      value: 'ton_tebang_total', text: 'Tebu Ditebang'
    },{
      value: 'ton_giling_total', text: 'Tebu Digiling'
    },{
      value: 'sisa_tebu', text: 'Sisa Tebu'
    },{
      value: 'gula_produksi', text: 'Produksi Gula Total'
    }
  ];
var jenis_data_2 = [{
    value: 'rend_total', text: 'Rendemen Total'
  },{
    value: 'pol_tebu', text: 'Pol Tebu'
  },{
    value: 'ef_me', text: 'HPG'
  },{
    value: 'ef_bhr', text: 'BHR'
  },{
    value: 'ef_or', text: 'OR'
}];
var jenis_data_3 = [{
    value: 'persen_pol_tetes', text: 'Pol Tetes'
  },{
    value: 'persen_pol_ampas', text: 'Pol Ampas'
  },{
    value: 'persen_pol_blotong', text: 'Pol Blotong'
}]
var data_grafik_1 = new Map();
var data_grafik_2 = new Map();
var label_grafik = [];
var label_grafik_2 = [];
//=====================================

//==== GRAPH OPTIONS ==================

var grafik_options = {
  chart: {
    type: "line",
    group: "kinerja",
    fontFamily: 'inherit',
    height: 250,
    parentHeightOffset: 0,
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
      top: 0,
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
  yaxis: [
    {
      labels: {
        minWidth: 40
      }
    },{
      opposite: true,
      min: 0,
      max: 600,
      forceNiceScale: true
    }
  ],
  labels: ['06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','00','01','02','03','04','05'],
  //colors: ["#69c41f", "#206bc4", "#206bc4",''],
  legend: {
    show: true,
  }
};

var options_grafik_1 = {
  chart: {
    type: 'line',
    group: 'kinerja',
    id: 'grafik_1',
    fontFamily: 'inherit',
    height: 250,
    parentHeightOffset: 0,
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
      name: "1",
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
  yaxis: [
    {
      labels: {
        minWidth: 40
      }
    },{
      opposite: true,
      min: 0,
      max: 600,
      forceNiceScale: true
    }
  ],
  labels: ['06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','00','01','02','03','04','05'],
  //colors: ["#69c41f", "#206bc4", "#206bc4",''],
  legend: {
    show: true,
  }
};

var options_grafik_2 = {
  chart: {
    type: 'line',
    group: 'kinerja',
    id: 'grafik_2',
    fontFamily: 'inherit',
    height: 250,
    parentHeightOffset: 0,
    animations: {
      enabled: false
    },
    stacked: false,
    zoom: {
      enabled: true
    },
    toolbar: {
      show: false,
      offsetY: -130,
      offsetX: 200
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
      name: "1",
      data: []
    }
  ],
  grid: {
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
  yaxis: [
    {
      labels: {
        minWidth: 40
      }
    }
  ],
  labels: ['06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','00','01','02','03','04','05'],
  //colors: ["#69c41f", "#206bc4", "#206bc4",''],
  legend: {
    show: true,
  }
};



//=====================================

function initCbxJenisData(){
  cbx_jenis_data.selectize({
    create: false,
    sortField: "text",
    onChange: function(value){

    }
  });
  cbx_jenis_data[0].selectize.addOption(jenis_data);
  cbx_jenis_data_2.selectize({
    create: false,
    sortField: "text",
    onChange: function(value){

    }
  });
  cbx_jenis_data_2[0].selectize.addOption(jenis_data_2);
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
      jenis_data_terpilih_1 = cbx_jenis_data[0].selectize.items;
      var tgl = new Date();
      arr_data_grafik_1 = [];
      y_grafik_1 = [];
      var counter = 0;
      //=============== GRAFIK 1
      for(var i = 0; i < jenis_data_terpilih_1.length; i++){
        var nama_series = jenis_data.filter((e) => e.value === jenis_data_terpilih_1[i]);
        //var nama_series = [];
        //nama_series[0] = jenis_data_terpilih_1[i];
        var baris_data = [];
        for(var j = 0; j < data.length; j++){
          var dateFormat = 'yyyy-MM-dd';
          tgl = Date.parse(data[j].tgl_giling + 'T00:00:00');
          label_grafik[j] = tgl;
          for(var nama_kolom in data[j]){
            if(nama_kolom === jenis_data_terpilih_1[i]){
              baris_data[j] = data[j][nama_kolom];
            }
          }
        }
        arr_data_grafik_1[i] = {
          name: nama_series[0].text,
          type: ((nama_series[0].value == 'sisa_tebu') ? 'column' : 'line'),
          data: baris_data
        }
        if(nama_series[0].value === "gula_produksi"){
          y_grafik_1[i] = {
            opposite: ((jenis_data_terpilih_1.length > 1) ? true : false),
            min: 0,
            max: 600,
            forceNiceScale: true,
          };
        } else {
          if (counter == 0){
            y_grafik_1[i] = {
              showAlways: true,
              min: 0,
              max: 7000,
              forceNiceScale: true
            };
          } else {
            y_grafik_1[i] = {
              show: false
            };
          }
          counter++;
        }
      }
      //================== GRAFIK 2
      jenis_data_terpilih_2 = cbx_jenis_data_2[0].selectize.items;
      tgl = new Date();
      data_grafik_2 = new Map();
      arr_data_grafik_2 = [];
      y_grafik_2 = [];
      var counter_kecil = 0;
      var counter_besar = 0;
      var arr_series_besar = ['ef_me', 'ef_or', 'ef_bhr', 'ef_hpg'];
      var arr_series_kecil = ['pol_tebu', 'rend_total'];
      var seriesNameBesar = [];
      var seriesNameKecil = [];
      for(var i = 0; i < jenis_data_terpilih_2.length; i++){
        var nama_series_2 = jenis_data_2.filter((e) => e.value === jenis_data_terpilih_2[i]);
        //var nama_series_2 = [];
        //nama_series_2[0] = jenis_data_terpilih_2[i];
        var baris_data_2 = [];
        for(var j = 0; j < data.length; j++){
          var dateFormat = 'yyyy-MM-dd';
          tgl = Date.parse(data[j].tgl_giling + 'T00:00:00');
          label_grafik_2[j] = tgl;
          for(var nama_kolom in data[j]){
            if(nama_kolom === jenis_data_terpilih_2[i]){
              baris_data_2[j] = data[j][nama_kolom];
            }
          }
        }
        arr_data_grafik_2[i] = {
          name: nama_series_2[0].text,
          type: ((nama_series_2[0].value === 'pol_tebu' || nama_series_2[0].value === 'rend_total') ? 'column' : 'line'),
          data: baris_data_2
        }
        seriesNameBesar = jenis_data_terpilih_2.filter(item => arr_series_besar.includes(item));
        seriesNameKecil = jenis_data_terpilih_2.filter(item => arr_series_kecil.includes(item));
        seriesNameKecil = arr_series_kecil;
        seriesNameBesar = arr_series_besar;
        if(nama_series_2[0].value === 'pol_tebu' || nama_series_2[0].value === 'rend_total'){
          y_grafik_2[i] = {
            seriesName: seriesNameKecil[0].text,
            show: ((counter_kecil == 0) ? true : false)
          }
          counter_kecil++;
        } else {
          y_grafik_2[i] = {
            seriesName: seriesNameBesar[0].text,
            opposite: ((seriesNameKecil.length > 1) ? true : false),
            show: ((counter_besar == 0) ? true : false)
          }
          counter_besar++;
        }
      }
      //render_grafik_1 = Array.from(data_grafik_1, ([name,data]) => ({name,data}));
      //render_grafik_2 = Array.from(data_grafik_2, ([name,data]) => ({name,data}));
      var grafik_1 = new ApexCharts(document.querySelector("#grafik_1"),
          grafik_options
        );
      var grafik_2 = new ApexCharts(document.querySelector("#grafik_2"),
          grafik_options
        );
      grafik_1.render();
      grafik_2.render();
      grafik_1.updateSeries(arr_data_grafik_1);
      grafik_2.updateSeries(arr_data_grafik_2);
      grafik_1.updateOptions({
        labels: label_grafik,
        yaxis: y_grafik_1,
        chart: {
          id: 'grafik_1',
          group: 'kinerja'
        }
      });
      grafik_2.updateOptions({
        labels: label_grafik_2,
        yaxis: y_grafik_2,
        chart: {
          id: 'grafik_2',
          group: 'kinerja'
        }
      });
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
