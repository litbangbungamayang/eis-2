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
              Petak Kebun
            </h2>
          </div>
        </div>
      </div>
      <!-- ===================== -->
      <div class="page-body">
        <div class="container-xl">
          <div class="row row-cards">
            <!-- TABEL -->
            <div class="col-sm-12 col-lg-8">
              <div class="card card-body">
                <div class="card-title"></div>
                <div class="table-responsive">
                  <table style="font-size: 0.9em" id="tblPetak" class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                      <tr>
                        <th class="w-1">No.</th>
                        <th>Deskripsi Petak</th>
                        <th>Luas Tanam</th>
                        <th>Varietas</th>
                      </tr>
                    </thead>
                    <tbody id="dataPetak">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- =========================== -->
            <!-- PREVIEW -->
            <div class="col-sm-4 col-lg-4">
                <div class="card card-body">
                    <h3 class="card-title">Atribut Petak</h3>
                </div>
            </div>
            <!-- =========================== -->
          </div>
        </div>
      </div>
      <!--=======================-->
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_petak_kebun'); ?>

<?= $this->endSection(); ?>
