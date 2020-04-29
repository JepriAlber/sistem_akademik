<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Masuk Ke Halaman Transkip Nilai</h1>
    </div>

    <div class="section-body">
      <?=$this->session->flashdata('pesan'); ?>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Cek NPM Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/transkrip_nilai/buat_transkrip_nilai_aksi')?>" method="POST">

                  <div class="form-group">
                  <label for="npm">NPM Mahasiswa :</label>
                  <input type="text" name="npm" class="form-control " id="npm">
                  <small class="form-text text-danger"><?=form_error('npm'); ?></small>
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Proses</button>
                  </div>     
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>