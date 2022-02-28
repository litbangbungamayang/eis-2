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
            <!-- PREVIEW -->
            <div class="col-sm-4 col-lg-4">
                <div class="card card-body sticky-top">
                    <h3 class="card-title">Detail Petak</h3>
                    <div class="card-img-top img-responsive img-responsive-16by9" style="background-image: url(./public/assets/profil_petak.jpg)"></div>
                    <div class="subheader">kepemilikan</div>
                    <div class="h4 mb-3" id="lbl_kepemilikan">[kepemilikan]</div>
                    <div class="subheader">Deskripsi</div>
                    <div class="h4 mb-3" id="lbl_deskripsi_blok">[deskripsi_blok]</div>
                    <div class="subheader">Kategori</div>
                    <div class="h4 mb-3" id="lbl_kategori">[kategori]</div>
                    <div class="subheader">Varietas</div>
                    <div class="h4 mb-3" id="lbl_varietas">[varietas]</div>
                    <div class="card-text">
                      <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <!-- =========================== -->
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
