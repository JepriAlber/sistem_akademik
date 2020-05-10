<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Informasi Kampus</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Informasi Kampus</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/informasi/tambah_aksi')?>" method="POST">
                <div class="form-group">
                  <label for="icon">Icon :</label>
                  <input type="text" name="icon" class="form-control " id="icon">
                   <small class="form-text text-danger"><?=form_error('icon'); ?></small>
                </div>
                <div class="form-group">
                  <label for="judul_informasi">Judul Informasi :</label>
                  <input type="text" name="judul_informasi" class="form-control " id="judul_informasi">
                  <small class="form-text text-danger"><?=form_error('judul_informasi'); ?></small>
                </div>
                <div class="form-group">
                  <label for="isi_informasi">Isi Informasi :</label>
                  <textarea name="isi_informasi" class="form-control " id="isi_informasi"></textarea>
                  <small class="form-text text-danger"><?=form_error('isi_informasi'); ?></small>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" onclick="return confirm('Apakah ada yakin ingin Simpan data ini?')">Simpan</button>
                  </div>     
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>