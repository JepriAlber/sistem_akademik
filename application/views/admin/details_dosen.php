<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-eye mr-2"></i><h1> Dosen</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Details Dosen</h4>
            </div>
            <div class="card-body">
                <table border="0">
                  <?php foreach ($details as $detail): ?>
                      <div class="card author-box card-primary">
                        <div class="card-body">
                          <div class="author-box-left">
                            <img alt="image" src="<?=base_url('assets/uploads/').$detail->photo;?>" class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            <div class="btn btn-primary mt-3"><?=$detail->nidn; ?></div>
                          </div>
                          <div class="author-box-details">
                            <div class="author-box-name">
                              <a href="#"><?=$detail->nama_dosen; ?></a>
                            </div>
                            <div class="author-box-job"><?=$detail->email; ?></div>
                            <div class="author-box-description">
                              <ul>
                                <li>Jenis Kelamin     : <?=$detail->jenis_kelamin; ?></li>
                                <li>Nomor Telepon     : <?=$detail->telp; ?></li>
                                <li>Alamat     : <?=$detail->alamat; ?></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php endforeach ?>
                </table>
                <div class="card-footer text-right">
                <a href="<?=base_url('admin/dosen') ?>" class="btn btn-sm btn-primary">Kembali</a>  
                </div>
                
          </div>
        </div>
      </div>
    </div>
  </section>
</div>