<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Prodi</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Prodi</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/prodi/Tambah_prodi_aksi')?>" method="POST">
                <div class="form-group">
                  <label for="kode_prodi">Kode Prodi :</label>
                  <input type="text" name="kode_prodi" class="form-control " id="kode_prodi">
                   <small class="form-text text-danger"><?=form_error('kode_prodi'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nama_prodi">Nama Prodi :</label>
                  <input type="text" name="nama_prodi" class="form-control " id="nama_prodi">
                  <small class="form-text text-danger"><?=form_error('nama_prodi'); ?></small>
                </div>
                <div>
                  <label for="nama_jurusan">Nama Jurusan :</label>
                  <select name="nama_jurusan" class="form-control">
                      <option value="">-Pilih-</option>
                    <?php foreach ($jurusan as $jur): ?>
                      <option value="<?=$jur->nama_jurusan ?>"><?=$jur->nama_jurusan ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?=form_error('nama_jurusan'); ?></small>
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