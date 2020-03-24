    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
     <h1><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</h1>
    </div>
    <div class="section-body">  
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
            </div>
            <div class="card-body">

                <div class="alert alert-success alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                  <div class="alert-title">Selamat Datang!</div>
                    <p>Selamat Datang <strong><?=$username; ?></strong> di Sistem Akademik Universitas Icak Icak, Anda Login Sebagai <strong><?=$level ?></strong></p>
                    <hr>
                    <button class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#control-pannel"><i class="fas fa-cogs"></i> Control Pannel</button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
              <div class="modal fade" id="control-pannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Pannel</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="row">
                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">MAHASISWA</p></a>
                          <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">TAHUN AKADEMIK</p></a>
                          <i class="fas fa-3x fa-calendar-alt"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">KRS</p></a>
                          <i class="fas fa-3x fa-edit"></i>
                        </div>

                       <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">KHS</p></a>
                          <i class="fas fa-3x fa-file-alt"></i>
                        </div>
                      </div>
                      <hr>
                       <div class="row">
                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">INPUT NILAI</p></a>
                          <i class="fas fa-3x fa-sort-numeric-down"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">CETAK TRANSKRIP</p></a>
                          <i class="fas fa-3x fa-print"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">KATEGORI</p></a>
                          <i class="fas fa-3x fa-list-ul"></i>
                        </div>

                       <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">INFO KAMPUS</p></a>
                          <i class="fas fa-3x fa-bullhorn"></i>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">IDENTITAS</p></a>
                          <i class="fas fa-3x fa-id-card-alt"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">TENTANG KAMPUS</p></a>
                          <i class="fas fa-3x fa-info-circle"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">FASILITAS</p></a>
                          <i class="fas fa-3x fa-laptop"></i>
                        </div>

                       <div class="col-md-3 text-info text-center">
                          <a href="<?=base_url(); ?>"><p class="nav-link small text-info">Galery</p></a>
                          <i class="fas fa-3x fa-image"></i>
                        </div>
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>