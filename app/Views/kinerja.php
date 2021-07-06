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
              Pencapaian Kinerja
            </h2>
          </div>
        </div>
      </div>
      <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="page-pretitle">Realisasi terhadap </div>
              <select class="custom-control custom-select" id="sel_target"></select>
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
                <h3 class="card-title">Tebu Digiling</h3>
                <div class="row row-cards">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Bungamayang</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_tebu_ditebang_buma"></div>
                        <div class="d-flex mb-2">
                          <div id="ton_tebu_ditebang_buma">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; background-color: white" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_tebu_ditebang_buma">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Cinta Manis</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_tebu_ditebang_cima"></div>
                        <div class="d-flex mb-2">
                          <div id="ton_tebu_ditebang_cima">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; color=" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_tebu_ditebang_cima">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">BCN</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_tebu_ditebang_bcn">75%</div>
                        <div class="d-flex mb-2">
                          <div id="ton_tebu_ditebang_bcn">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-blue" style="width: 0%" role="progressbar"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="progress_tebu_ditebang_bcn">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Protas TS -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Produktivitas TS</h3>
                <div class="row row-cards">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Bungamayang</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_protas_buma"></div>
                        <div class="d-flex mb-2">
                          <div id="protas_buma">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; background-color: white" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_protas_buma">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Cinta Manis</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_protas_cima">0</div>
                        <div class="d-flex mb-2">
                          <div id="protas_cima">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; color=" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_protas_cima">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">BCN</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_protas_bcn">0</div>
                        <div class="d-flex mb-2">
                          <div id="protas_bcn">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-blue" style="width: 0%" role="progressbar"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="progress_protas_bcn">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Gula Milik PG -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Gula Produksi (Milik PG)</h3>
                <div class="row row-cards">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Bungamayang</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_gmpg_buma"></div>
                        <div class="d-flex mb-2">
                          <div id="gmpg_buma">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; background-color: white" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_gmpg_buma">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Cinta Manis</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_gmpg_cima">0</div>
                        <div class="d-flex mb-2">
                          <div id="gmpg_cima">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; color=" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_gmpg_cima">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">BCN</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_gmpg_bcn">0</div>
                        <div class="d-flex mb-2">
                          <div id="gmpg_bcn">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-blue" style="width: 0%" role="progressbar"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="progress_gmpg_bcn">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Gula Produksi Total -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Gula Produksi (Total)</h3>
                <div class="row row-cards">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Bungamayang</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_gmt_buma"></div>
                        <div class="d-flex mb-2">
                          <div id="gmt_buma">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; background-color: white" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_gmt_buma">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Cinta Manis</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_gmt_cima">0</div>
                        <div class="d-flex mb-2">
                          <div id="gmt_cima">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; color=" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_gmt_cima">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">BCN</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_gmt_bcn">0</div>
                        <div class="d-flex mb-2">
                          <div id="gmt_bcn">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-blue" style="width: 0%" role="progressbar"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="progress_gmt_bcn">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Rendemen -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Rendemen</h3>
                <div class="row row-cards">
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Bungamayang</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_rend_buma"></div>
                        <div class="d-flex mb-2">
                          <div id="rend_buma">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; background-color: white" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_rend_buma">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">Cinta Manis</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_rend_cima">0</div>
                        <div class="d-flex mb-2">
                          <div id="rend_cima">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar" style="width: 0%; color=" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" id="progress_rend_cima">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-center">
                          <div class="subheader">BCN</div>
                          <div class="ms-auto lh-1">
                            <!-- placeholder untuk pojok kanan atas -->
                          </div>
                        </div>
                        <div class="h1 mb-3" id="persen_rend_bcn">0</div>
                        <div class="d-flex mb-2">
                          <div id="rend_bcn">0</div>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-blue" style="width: 0%" role="progressbar"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" id="progress_rend_bcn">
                            <span class="visually-hidden">75% Complete</span>
                          </div>
                        </div>
                      </div>
                    </div>
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

<?= $this->include('Scripts/script_kinerja'); ?>

<?= $this->endSection(); ?>
