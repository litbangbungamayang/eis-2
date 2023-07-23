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
              Data Khusus
            </h2>
          </div>
        </div>
      </div>
      <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="page-pretitle">Tanggal timbang </div>
              <input type="date" class="form-control" id="dtp_tgl"></input>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">
          <!-- Tebu Digiling -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title"></h3>
                <div class="row row-cards">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th>Afd</th>
                          <th>Hari Ini</th>
                          <th>S.d. Hari Ini</th>
                        </tr>
                      </thead>
                      <tbody id="dataText">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_khusus'); ?>

<?= $this->endSection(); ?>
