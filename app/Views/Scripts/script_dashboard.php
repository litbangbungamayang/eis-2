<script>
  window.js_base_url = "<? echo base_url(); ?>" + "/index.php/";
  const bulan = ["JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGT", "SEP", "OKT", "NOV", "DES"];

  var tgl_last_lhp_buma = new Date();
  var v_tgl_giling = new Date();
  var v_tgl_giling_skrg = new Date();
  var v_tgl_giling_kemarin = new Date();
  var tgl_giling = $("#tgl_giling");
  var tgl_aktual = $("#tgl_aktual");
  //----- CIMA --------
  var tgl_last_lhp_cima = new Date();
  var tebu_masuk_hi_cima = $("#tebu_masuk_hi_cima");
  var tebu_masuk_sd_cima = $("#tebu_masuk_sd_cima");
  var tebu_giling_hi_cima = $("#tebu_giling_hi_cima");
  var tebu_giling_sd_cima = $("#tebu_giling_sd_cima");
  var protas_sd_cima = $("#protas_sd_cima");
  var protas_hi_cima = $("#protas_hi_cima");
  var txt_gula_hi_cima = $("#gula_hi_cima");
  var txt_gula_sd_cima = $("#gula_sd_cima");
  var stok_cima = $("#stok_cima");
  var arr_data_dashboard_cima = [];
  var arr_data_lhp_cima = [];
  var txt_hargil_cima = $("#hargil_cima");

  var cima_ton_masuk_sd;
  var cima_ton_giling_sd;
  var cima_tebu_masuk_hi;
  var cima_tebu_giling_hi;
  var cima_ton_giling_ts;
  var cima_ton_giling_ts_sd;
  var cima_ha_giling_ts;
  var cima_ha_giling_ts_sd;
  var cima_gula_produksi;
  var cima_gula_produksi_sd;
  //-------------------

  //----- BUMA ---------
  var tgl_last_lhp_buma = new Date();
  var tebu_masuk_hi_buma = $("#tebu_masuk_hi_buma");
  var tebu_masuk_sd_buma = $("#tebu_masuk_sd_buma");
  var tebu_giling_hi_buma = $("#tebu_giling_hi_buma");
  var tebu_giling_sd_buma = $("#tebu_giling_sd_buma");
  var protas_sd_buma = $("#protas_sd_buma");
  var protas_hi_buma = $("#protas_hi_buma");
  var txt_gula_hi_buma = $("#gula_hi_buma");
  var txt_gula_sd_buma = $("#gula_sd_buma");
  var stok_buma = $("#stok_buma");
  var arr_data_dashboard_buma = [];
  var arr_data_lhp_buma = [];
  var txt_hargil_buma = $("#hargil_buma");

  var buma_ton_masuk_sd;
  var buma_ton_giling_sd;
  var buma_tebu_masuk_hi;
  var buma_tebu_giling_hi;
  var buma_ton_giling_ts;
  var buma_ton_giling_ts_sd;
  var buma_ha_giling_ts;
  var buma_ha_giling_ts_sd;
  var buma_gula_produksi;
  var buma_gula_produksi_sd;
  //--------------------

  //------ BCN ---------
  var tebu_masuk_hi_bcn = $("#tebu_masuk_hi_bcn");
  var tebu_masuk_sd_bcn = $("#tebu_masuk_sd_bcn");
  var tebu_giling_hi_bcn = $("#tebu_giling_hi_bcn");
  var tebu_giling_sd_bcn = $("#tebu_giling_sd_bcn");
  var protas_sd_bcn = $("#protas_sd_bcn");
  var protas_hi_bcn = $("#protas_hi_bcn");
  var txt_gula_hi_bcn = $("#gula_hi_bcn");
  var txt_gula_sd_bcn = $("#gula_sd_bcn");
  var stok_bcn = $("#stok_bcn");
  //--------------------

  var arr_tebu_masuk_cima = [];
  var arr_tebu_giling_cima = [];
  var arr_tebu_masuk_buma = [];
  var arr_tebu_giling_buma = [];
  var arr_tebu_masuk_bcn = [];
  var arr_tebu_giling_bcn = [];

  //---------- holder untuk target kinerja -------- //
  var arr_target_rkap_buma = [];
  var arr_target_rkap_cima = [];
  var arr_target_takmar_buma = [];
  var arr_target_takmar_cima = [];
  //-------------------------------------------------
  const formatOptions = {maximumFractionDigits: 2, minimumFractionDigits: 2};
  const formatting = new Intl.NumberFormat('id-UK', formatOptions);
  function defaultLoad(){
    refreshData();
    setInterval(function(){ refreshData() }, 5000);
    /* TES GPS LOCATION */
    getLocation();
    /********************/
  }

  function getLocation(){
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(logPosition);
    } else {
      alert("Geolocation is not supported");
    }
  }

  function logPosition(position){
    //console.log(position.coords.latitude + "," + position.coords.longitude);
    //alert(position.coords.latitude + "," + position.coords.longitude);
  }

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
</script>

<script>
  // @formatter:off
  // HOURLY BUNGAMAYANG
  var grafik_options = {
    chart: {
      id: "hourly-cima-id",
      type: "area",
      fontFamily: 'inherit',
      height: 240,
      parentHeightOffset: 0,
      toolbar: {
        show: false,
      },
      animations: {
        enabled: false
      },
      stacked: false,
      zoom: {
        enabled: false
      }
    },
    stroke: {
      width: 2
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
      type: 'string',
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
    colors: ["#69c41f", "#206bc4", "#206bc4",''],
    legend: {
      show: true,
    }
  };

  var grafik_buma = new ApexCharts(document.querySelector("#hourly-buma"),
      grafik_options
    );
  grafik_buma.render();

  function update_buma(){
    var url = js_base_url + "C_dashboard/getMonitoringIntegrasiPerPg?pg=buma";
    $.getJSON(url, function(response){
      arr_tebu_masuk_buma = convertArrayToNumber(response.tebu_masuk);
      arr_tebu_giling_buma = convertArrayToNumber(response.tebu_digiling);
      grafik_buma.updateSeries([
        {
          name:'Tebu Masuk',
          data: arr_tebu_masuk_buma
        },
        {
          name:'Tebu Digiling',
          data: arr_tebu_giling_buma
        }
      ]);
    });
    var url_2 = js_base_url + "C_dashboard/getDataDashboard?pg=buma";
    $.getJSON(url_2, function(response){
      arr_data_dashboard_buma = response[0];
      buma_ton_masuk_sd = parseFloat(response[0].tebu_masuk || 0);
      buma_ton_giling_sd = parseFloat(response[0].tebu_giling || 0);
      buma_tebu_masuk_hi = parseFloat(response[0].tebu_masuk_hi || 0);
      buma_tebu_giling_hi = parseFloat(response[0].tebu_giling_hi || 0);
      buma_ton_giling_ts = 0;
      buma_ton_giling_ts_sd = 0;
      buma_ha_giling_ts = 0;
      buma_ha_giling_ts_sd = 0;
      if(arr_data_lhp_buma){
        buma_ton_giling_ts = parseFloat(arr_data_lhp_buma.ton_giling_ts_ptpn || 0);
        buma_ton_giling_ts_sd = parseFloat(arr_data_lhp_buma.ton_giling_ts_ptpn_sd || 0);
        buma_ha_giling_ts = parseFloat(arr_data_lhp_buma.ha_giling_ts_ptpn || 0);
        buma_ha_giling_ts_sd = parseFloat(arr_data_lhp_buma.ha_giling_ts_ptpn_sd || 0);
      }
      let caneyard_buma = buma_ton_masuk_sd - buma_ton_giling_sd;
      //console.log(buma_ton_giling_ts_sd);

      tebu_masuk_hi_buma.text(formatting.format(buma_tebu_masuk_hi));
      tebu_masuk_sd_buma.text(formatting.format(buma_ton_masuk_sd));
      tebu_giling_hi_buma.text(formatting.format(buma_tebu_giling_hi));
      tebu_giling_sd_buma.text(formatting.format(buma_ton_giling_sd));
      protas_hi_buma.text(formatting.format(buma_ton_giling_ts/buma_ha_giling_ts || 0));
      protas_sd_buma.text(formatting.format(buma_ton_giling_ts_sd/buma_ha_giling_ts_sd || 0));
      stok_buma.text(formatting.format(caneyard_buma));
    })
    var url_3 = js_base_url + "C_dashboard/getLastLhp?pg=buma";
    $.getJSON(url_3, function(response){
      if (response !== null){
        tgl_last_lhp_buma = new Date(response[0].last_lhp);
        //tgl_last_lhp_buma = "2022-07-01";
      }
    })
    var url_4 = js_base_url + "C_dashboard/getDataLastLhp?pg=buma";
    $.getJSON(url_4, function(response){
      console.log(response[0]);
      arr_data_lhp_buma = response[0];
      buma_gula_produksi = 0;
      buma_gula_produksi_sd = 0;
      if (arr_data_lhp_buma){
        buma_gula_produksi = parseFloat(arr_data_lhp_buma.gula_tr_ts_ptpn);
        buma_gula_produksi_sd = parseFloat(arr_data_lhp_buma.gula_tr_ts_ptpn_sd);
        txt_gula_hi_buma.text(formatting.format(buma_gula_produksi || 0));
        txt_gula_sd_buma.text(formatting.format(buma_gula_produksi_sd || 0));
      }
    })
    var url_5 = js_base_url + "C_dashboard/getTbSetting?pg=buma";
    $.getJSON(url_5, function(response){
      let v_tgl_mulai_giling = new Date(response[0].awal_giling);
      let v_tahun_mulai_giling = v_tgl_mulai_giling.getFullYear();
      let v_tahun_skrg = v_tgl_giling_skrg.getFullYear();
      if (v_tahun_mulai_giling != v_tahun_skrg){
        txt_hargil_buma.text("0");
      } else {
        txt_hargil_buma.text(Math.ceil((v_tgl_giling_skrg - v_tgl_mulai_giling)/(1000*60*60*24))+1);
      }

    })
  }
</script>
<script>
  // @formatter:off
  // HOURLY CINTA MANIS
  var grafik_options = {
    chart: {
      id: "hourly-cima-id",
      type: "area",
      fontFamily: 'inherit',
      height: 240,
      parentHeightOffset: 0,
      toolbar: {
        show: false,
      },
      animations: {
        enabled: false
      },
      stacked: false,
      zoom: {
        enabled: false
      }
    },
    stroke: {
      width: 2
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
      type: 'string',
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
    colors: ["#69c41f", "#206bc4", "#206bc4",''],
    legend: {
      show: true,
    }
  };

  var grafik_cima = new ApexCharts(document.querySelector("#hourly-cima"),
      grafik_options
    );
  grafik_cima.render();

  function update_cima(){
    var url = js_base_url + "C_dashboard/getMonitoringIntegrasiPerPg?pg=cima";
    $.getJSON(url, function(response){
      arr_tebu_giling_cima = convertArrayToNumber(response.tebu_digiling);
      arr_tebu_masuk_cima = convertArrayToNumber(response.tebu_masuk);
      grafik_cima.updateSeries([
        {
          name:'Tebu Masuk',
          data: arr_tebu_masuk_cima
        },
        {
          name:'Tebu Digiling',
          data: arr_tebu_giling_cima
        }
      ]);
    });
    var url_2 = js_base_url + "C_dashboard/getDataDashboard?pg=cima";
    $.getJSON(url_2, function(response){
      arr_data_dashboard_cima = response[0];
     cima_ton_masuk_sd = parseFloat(response[0].tebu_masuk || 0);
     cima_ton_giling_sd = parseFloat(response[0].tebu_giling || 0);
     cima_tebu_masuk_hi = parseFloat(response[0].tebu_masuk_hi || 0);
     cima_tebu_giling_hi = parseFloat(response[0].tebu_giling_hi || 0);
     cima_ton_giling_ts = 0;
     cima_ton_giling_ts_sd = 0;
     cima_ha_giling_ts = 0;
     cima_ha_giling_ts_sd = 0;
      if(arr_data_lhp_cima){
        cima_ton_giling_ts = parseFloat(arr_data_lhp_cima.ton_giling_ts_ptpn || 0);
        cima_ton_giling_ts_sd = parseFloat(arr_data_lhp_cima.ton_giling_ts_ptpn_sd || 0);
        cima_ha_giling_ts = parseFloat(arr_data_lhp_cima.ha_giling_ts_ptpn || 0);
        cima_ha_giling_ts_sd = parseFloat(arr_data_lhp_cima.ha_giling_ts_ptpn_sd || 0);
      }
      let caneyard_cima = cima_ton_masuk_sd - cima_ton_giling_sd;

      tebu_masuk_hi_cima.text(formatting.format(cima_tebu_masuk_hi));
      tebu_masuk_sd_cima.text(formatting.format(cima_ton_masuk_sd));
      tebu_giling_hi_cima.text(formatting.format(cima_tebu_giling_hi));
      tebu_giling_sd_cima.text(formatting.format(cima_ton_giling_sd));
      protas_hi_cima.text(formatting.format(cima_ton_giling_ts/cima_ha_giling_ts || 0));
      protas_sd_cima.text(formatting.format(cima_ton_giling_ts_sd/cima_ha_giling_ts_sd || 0));
      stok_cima.text(formatting.format(caneyard_cima));
    })
    var url_3 = js_base_url + "C_dashboard/getLastLhp?pg=cima";
    $.getJSON(url_3, function(response){
      tgl_last_lhp_cima = new Date(response[0].last_lhp);
    })
    var url_4 = js_base_url + "C_dashboard/getDataLastLhp?pg=cima";
    $.getJSON(url_4, function(response){
      arr_data_lhp_cima = response[0];
      cima_gula_produksi = 0;
      cima_gula_produksi_sd = 0;
      if(arr_data_lhp_cima){
        cima_gula_produksi = parseFloat(arr_data_lhp_cima.gula_tr_ts_ptpn);
        cima_gula_produksi_sd = parseFloat(arr_data_lhp_cima.gula_tr_ts_ptpn_sd);
        txt_gula_hi_cima.text(formatting.format(cima_gula_produksi || 0));
        txt_gula_sd_cima.text(formatting.format(cima_gula_produksi_sd || 0));
      }
    })
    var url_5 = js_base_url + "C_dashboard/getTbSetting?pg=cima";
    $.getJSON(url_5, function(response){
      let v_tgl_mulai_giling = new Date(response[0].awal_giling);
      let v_tahun_mulai_giling = v_tgl_mulai_giling.getFullYear();
      let v_tahun_skrg = v_tgl_giling_skrg.getFullYear();
      if (v_tahun_mulai_giling != v_tahun_skrg){
        txt_hargil_cima.text("0");
      } else {
        txt_hargil_cima.text(Math.ceil((v_tgl_giling_skrg - v_tgl_mulai_giling)/(1000*60*60*24))+1);
      }
    })
  }
</script>
<script>
  // @formatter:off
  // HOURLY BCN
  var grafik_options = {
    chart: {
      id: "hourly-bcn-id",
      type: "area",
      fontFamily: 'inherit',
      height: 240,
      parentHeightOffset: 0,
      toolbar: {
        show: false,
      },
      animations: {
        enabled: false
      },
      stacked: false,
      zoom: {
        enabled: false
      }
    },
    stroke: {
      width: 2
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
        name: "testbcn",
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
      type: 'string',
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
    colors: ["#69c41f", "#206bc4", "#206bc4",''],
    legend: {
      show: true,
    }
  };

  var grafik_bcn = new ApexCharts(document.querySelector("#hourly-bcn"),
      grafik_options
    );
  grafik_bcn.render();
  function updateBcn(){
    for(var i=0; i<24; i++){
      var buma = 0;
      var cima = 0;
      if (arr_tebu_masuk_buma[i] !== null) {buma = Number(arr_tebu_masuk_buma[i])};
      if (arr_tebu_masuk_cima[i] !== null) {cima = Number(arr_tebu_masuk_cima[i])};
      arr_tebu_masuk_bcn[i] = parseFloat(buma + cima).toFixed(2);
    }
    for (var i = 0; i < 24; i++){
      var buma = 0;
      var cima = 0;
      if (arr_tebu_giling_buma[i] !== null) {buma = Number(arr_tebu_giling_buma[i])};
      if (arr_tebu_giling_cima[i] !== null) {cima = Number(arr_tebu_giling_cima[i])};
      arr_tebu_giling_bcn[i] = parseFloat(buma + cima).toFixed(2);
    }
    //----- TODO : TAMBAHKAN PARAMETER UNTUK BUMA -------
    //console.log(arr_data_dashboard_buma.tebu_masuk);
    /*
    let ton_masuk_sd_buma = Number(arr_data_dashboard_buma.tebu_masuk);
    let ton_masuk_sd_cima = Number(arr_data_dashboard_cima.tebu_masuk);
    let ton_masuk_sd_bcn = Number(ton_masuk_sd_cima + ton_masuk_sd_buma);
    let ton_masuk_hi_buma = +arr_data_dashboard_buma.tebu_masuk_hi;
    let ton_masuk_hi_cima = +arr_data_dashboard_cima.tebu_masuk_hi;
    let ton_masuk_hi_bcn = Number(ton_masuk_hi_buma + ton_masuk_hi_cima);
    let ton_giling_hi_buma = +arr_data_dashboard_buma.tebu_giling_hi;
    let ton_giling_hi_cima = +arr_data_dashboard_cima.tebu_giling_hi;
    let ton_giling_hi_bcn = Number(ton_giling_hi_buma + ton_giling_hi_cima);
    let ton_giling_sd_buma = +arr_data_dashboard_buma.tebu_giling;
    let ton_giling_sd_cima = +arr_data_dashboard_cima.tebu_giling;
    let ton_giling_sd_bcn = Number(ton_giling_sd_buma + ton_giling_sd_cima);
    let gula_produksi_hi_buma = +arr_data_lhp_buma.gula_produksi;
    let gula_produksi_hi_cima = +arr_data_lhp_cima.gula_produksi;
    let gula_produksi_sd_buma = +arr_data_lhp_buma.gula_produksi_sd;
    let gula_produksi_sd_cima = +arr_data_lhp_cima.gula_produksi_sd;
    let gula_produksi_hi_bcn = Number(gula_produksi_hi_buma + gula_produksi_hi_cima);
    let gula_produksi_sd_bcn = Number(gula_produksi_sd_buma + gula_produksi_sd_cima);
    let tebu_masuk_ts_kemarin = Number(arr_data_dashboard_buma.tebu_masuk_ts_kemarin) + Number(arr_data_dashboard_cima.tebu_masuk_ts_kemarin);
    let tebu_masuk_ts_sd_kemarin = Number(arr_data_dashboard_buma.tebu_masuk_ts_sd_kemarin) + Number(arr_data_dashboard_cima.tebu_masuk_ts_sd_kemarin);
    let ha_tebang_ts_kemarin = Number(arr_data_dashboard_buma.ha_tebang_ts_kemarin) + Number(arr_data_dashboard_cima.ha_tebang_ts_kemarin);
    let ha_tebang_ts_sd_kemarin = Number(arr_data_dashboard_buma.ha_tebang_ts_sd_kemarin) + Number(arr_data_dashboard_cima.ha_tebang_ts_sd_kemarin);
    //console.log(tebu_masuk_ts_sd_kemarin);

    tebu_masuk_hi_bcn.text(formatting.format(cima_ton_masuk_sd));
    tebu_giling_hi_bcn.text(formatting.format(ton_giling_hi_bcn || 0));
    tebu_masuk_sd_bcn.text(formatting.format(parseFloat(ton_masuk_sd_bcn || 0).toFixed(2)));
    tebu_giling_sd_bcn.text(formatting.format(ton_giling_sd_bcn || 0));
    txt_gula_hi_bcn.text(formatting.format(gula_produksi_hi_bcn || 0));
    txt_gula_sd_bcn.text(formatting.format(gula_produksi_sd_bcn || 0));

    protas_hi_bcn.text(formatting.format((Number(arr_data_lhp_buma.ton_giling_ts)+Number(arr_data_lhp_cima.ton_giling_ts))/
      (Number(arr_data_lhp_buma.ha_giling_ts)+Number(arr_data_lhp_cima.ha_giling_ts)) || 0));
    protas_sd_bcn.text(formatting.format((Number(arr_data_lhp_buma.ton_giling_ts_sd)+Number(arr_data_lhp_cima.ton_giling_ts_sd))/
      (Number(arr_data_lhp_buma.ha_giling_ts_sd)+Number(arr_data_lhp_cima.ha_giling_ts_sd)) || 0));
    */
    //console.log(ton_giling_ts);
    tebu_masuk_hi_bcn.text(formatting.format(cima_tebu_masuk_hi + buma_tebu_masuk_hi || 0));
    tebu_giling_hi_bcn.text(formatting.format(cima_tebu_giling_hi + buma_tebu_giling_hi || 0));
    tebu_masuk_sd_bcn.text(formatting.format(cima_ton_masuk_sd + buma_ton_masuk_sd || 0));
    tebu_giling_sd_bcn.text(formatting.format(cima_ton_giling_sd + buma_ton_giling_sd || 0));
    txt_gula_hi_bcn.text(formatting.format(buma_gula_produksi + cima_gula_produksi || 0));
    txt_gula_sd_bcn.text(formatting.format(buma_gula_produksi_sd + cima_gula_produksi_sd || 0));
    protas_hi_bcn.text(formatting.format((cima_ton_giling_ts + buma_ton_giling_ts)/(cima_ha_giling_ts + buma_ha_giling_ts) || 0));
    protas_sd_bcn.text(formatting.format((cima_ton_giling_ts_sd + buma_ton_giling_ts_sd)/(cima_ha_giling_ts_sd + buma_ha_giling_ts_sd) || 0));
    //------------------------------------------------------
    grafik_bcn.updateSeries([
      {
        name:'Tebu Masuk',
        data: arr_tebu_masuk_bcn
      },
      {
        name:'Tebu Digiling',
        data: arr_tebu_giling_bcn
      }
    ]);
    var url = js_base_url + "C_dashboard/tesDb";
    $.getJSON(url, function(response){
      //console.log(response);
    })
  }
</script>

<script>
  function appendLeadingZeroes(n){
    if (n <= 9){
      return "0" + n;
    }
    return n;
  }

  function refreshData() {
    var date = new Date();
    var time = date.toLocaleTimeString();
    $.ajax({
      url: js_base_url + "C_dashboard/getTglTimbang",
      type: "GET",
      dataType: "json"
    }).done(function(data){
      //var tgl = new Date(data);
      v_tgl_giling = new Date(data);
      v_tgl_giling_skrg = new Date(data);
      var formatted_tgl_giling = appendLeadingZeroes(v_tgl_giling.getDate())
        + "-" + bulan[v_tgl_giling.getMonth()] + "-" + v_tgl_giling.getFullYear();
      tgl_giling.text("Tanggal Giling : " + formatted_tgl_giling);
      var tgl_skr = new Date();
      var formatted_tgl_skr = appendLeadingZeroes(tgl_skr.getDate()) + "-" +
        bulan[tgl_skr.getMonth()] + "-" + tgl_skr.getFullYear() + " " +
        appendLeadingZeroes(tgl_skr.getHours()) + ":" + appendLeadingZeroes(tgl_skr.getMinutes()) + ":" +
        appendLeadingZeroes(tgl_skr.getSeconds());
      tgl_aktual.text("Last update : " + formatted_tgl_skr);
      v_tgl_giling_kemarin = new Date(v_tgl_giling.setDate(v_tgl_giling.getDate()-1));
    });
    update_cima();
    update_buma();
    updateBcn();
  }
</script>
