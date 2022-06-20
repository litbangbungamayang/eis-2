<?= $this->extend('Templates/app_layout'); ?>

<?= $this->section('header'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
  <?= $this->include('Templates/sidemenu') ?>
  <div class="page-wrapper">
    <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="page-title">
              Laporan Harian
            </h2>
          </div>
        </div>
      </div>
      <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="page-pretitle">Tanggal </div>
              <div class="col-lg-6 input-group">
                <input type="date" class="form-control" id="dtp_tgl_awal"></input>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">BCN</h3>
                <table class="h6 table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th rowspan="2" style="text-align:center">URAIAN</th>
                      <th colspan="3" style="text-align:center">1 TAHUN</th>
                      <th colspan="2" style="text-align:center">REALISASI 2022</th>
                      <th colspan="2" style="text-align:center">REALISASI 2021</th>
                      <th colspan="3" style="text-align:center">REAL. SD HI THD 1 THN</th>
                    </tr>
                    <tr>
                      <th style="text-align:center">REAL 2021</th>
                      <th style="text-align:center">RKAP 2022</th>
                      <th style="text-align:center">TAKMAR 2022</th>
                      <th style="text-align:center">HARI INI</th>
                      <th style="text-align:center">S.D. HARI INI</th>
                      <th style="text-align:center">HARI INI</th>
                      <th style="text-align:center">S.D. HARI INI</th>
                      <th style="text-align:center">REAL 2021</th>
                      <th style="text-align:center">RKAP 2022</th>
                      <th style="text-align:center">TAKMAR 2022</th>
                      <!-- 11 KOLOM -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="11">LUAS DIGILING (HA)</td>
                    </tr>
                    <tr>
                      <td>TEBU SENDIRI</td>
                    </tr>
                    <tr>
                      <td>TSI - BEKRI</td>
                    </tr>
                    <tr>
                      <td>TSI - TUBU</td>
                    </tr>
                    <tr>
                      <td>JUMLAH TS</td>
                    </tr>
                    <tr>
                      <td>TR</td>
                    </tr>
                    <tr>
                      <td>TOTAL LUAS</td>
                    </tr>
                    <!-- TEBU DIGILING -->
                    <tr>
                      <td colspan="11">TEBU DIGILING (TON)</td>
                    </tr>
                    <tr>
                      <td>TEBU SENDIRI</td>
                    </tr>
                    <tr>
                      <td>TSI - BEKRI</td>
                    </tr>
                    <tr>
                      <td>TSI - TUBU</td>
                    </tr>
                    <tr>
                      <td>JUMLAH TS</td>
                    </tr>
                    <tr>
                      <td>TR</td>
                    </tr>
                    <tr>
                      <td>TOTAL DIGILING</td>
                    </tr>
                    <!-- TEBU PROTAS -->
                    <tr>
                      <td colspan="11">PRODUKTIVITAS TEBU (TON/HA)</td>
                    </tr>
                    <tr>
                      <td>TEBU SENDIRI</td>
                    </tr>
                    <tr>
                      <td>TSI - BEKRI</td>
                    </tr>
                    <tr>
                      <td>TSI - TUBU</td>
                    </tr>
                    <tr>
                      <td>RATA2 TS</td>
                    </tr>
                    <tr>
                      <td>TR</td>
                    </tr>
                    <tr>
                      <td>RATA2 PROTAS</td>
                    </tr>
                    <!-- HABLUR -->
                    <tr>
                      <td colspan="11">HABLUR (TON)</td>
                    </tr>
                    <tr>
                      <td>TEBU SENDIRI</td>
                    </tr>
                    <tr>
                      <td>TSI - BEKRI</td>
                    </tr>
                    <tr>
                      <td>TSI - TUBU</td>
                    </tr>
                    <tr>
                      <td>TOTAL TS</td>
                    </tr>
                    <tr>
                      <td>TR</td>
                    </tr>
                    <tr>
                      <td>TOTAL HABLUR</td>
                    </tr>
                    <!-- RENDEMEN -->
                    <tr>
                      <td colspan="11">RENDEMEN (%)</td>
                    </tr>
                    <tr>
                      <td>TEBU SENDIRI</td>
                    </tr>
                    <tr>
                      <td>TSI - BEKRI</td>
                    </tr>
                    <tr>
                      <td>TSI - TUBU</td>
                    </tr>
                    <tr>
                      <td>RATA2 TS</td>
                    </tr>
                    <tr>
                      <td>TR</td>
                    </tr>
                    <tr>
                      <td>RATA2 RENDEMEN</td>
                    </tr>
                    <!-- PRODUKSI GULA -->
                    <tr>
                      <td colspan="11">PROD. GULA (TON)</td>
                    </tr>
                    <tr>
                      <td>TEBU SENDIRI</td>
                    </tr>
                    <tr>
                      <td>TS EKS. TR</td>
                    </tr>
                    <tr>
                      <td>JUMLAH GMPG</td>
                    </tr>
                    <tr>
                      <td>JUMLAH GMTR</td>
                    </tr>
                    <tr>
                      <td>TOTAL PRODUKSI</td>
                    </tr>
                    <!-- PRODUKSI TETES -->
                    <tr>
                      <td colspan="11">PROD. TETES (TON)</td>
                    </tr>
                    <tr>
                      <td>TEBU SENDIRI</td>
                    </tr>
                    <tr>
                      <td>TS EKS. TR</td>
                    </tr>
                    <tr>
                      <td>JUMLAH TMPG</td>
                    </tr>
                    <tr>
                      <td>JUMLAH TMTR</td>
                    </tr>
                    <tr>
                      <td>TOTAL PRODUKSI</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_daily_report'); ?>

<?= $this->endSection(); ?>
