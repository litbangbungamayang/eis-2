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
              Detail Petak Kebun
            </h2>
          </div>
        </div>
      </div>
      <!-- ===================== -->
      <div class="page-body">
        <div class="container-xl">
          <div class="row row-cards">
            <div class="col-sm-12 col-lg-12">
              <div class="card card-body">
                <div class="card-title"><?= esc($deskripsi_blok) ?></div>
                <div class="row row-cards">
                  <div class="col-lg-6">
                    <div>Unit <b><?= esc($nama_unit) ?></b></div>
                    <div>Kode Petak <b><?= esc($kode_blok) ?></b></div>
                    <div>Wilayah <b><?= esc($wilayah) ?></b></div>
                    <div>Afdeling <b><?= esc($divisi) ?></b></div>
                  </div>
                  <div class="col-lg-6">
                    <div>Kategori <b><?= esc($status_blok) ?></b></div>
                    <div>Varietas <b><?= esc($nama_varietas) ?></b></div>
                    <div>Masa Tanam <b><?= esc($periode) ?></b></div>
                    <div>Status <b><?= esc($kepemilikan) ?></b></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row row-cards">
            <div class="col-sm-12 col-lg-12">
              <div class="card card-body">
                <div class="accordion" id="accordion-example">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-1">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false">
                        Data Taksasi
                      </button>
                    </h2>
                    <div id="collapse-1" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                      <div class="accordion-body pt-0">
                        Berikut adalah data taksasi yang telah dilaksanakan pada petak ini:
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false">
                        Data Analisa
                      </button>
                    </h2>
                    <div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                      <div class="accordion-body pt-0">
                        Berikut adalah data analisa yang telah dilaksanakan pada petak ini:
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-3">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false">
                        Data Pekerjaan Kebun
                      </button>
                    </h2>
                    <div id="collapse-3" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                      <div class="accordion-body pt-0">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-4">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false">
                        Data Produksi
                      </button>
                    </h2>
                    <div id="collapse-4" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                      <div class="accordion-body pt-0">
                        <strong>This is the fourth item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--=======================-->
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<?= $this->include('Scripts/script_detail_petak'); ?>

<?= $this->endSection(); ?>
