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
              <h4>Edit Prodi</h4>
            </div>
            <div class="card-body">
                <?php foreach ($prodi as $prd): ?>
                  <form action="<?=base_url('admin/prodi/update_aksi')?>" method="POST">
                    <div class="form-group">
                      <label for="kode_prodi">Kode Prodi :</label>
                      <input type="hidden" name="id_prodi" value="<?=$prd->id_prodi ?>">
                      <input type="text" name="kode_prodi" class="form-control " id="kode_prodi" value="<?=$prd->kode_prodi ?>">
                       <small class="form-text text-danger"><?=form_error('kode_prodi'); ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama_prodi">Nama Prodi :</label>
                      <input type="text" name="nama_prodi" class="form-control " id="nama_prodi" value="<?=$prd->nama_prodi ?>">
                      <small class="form-text text-danger"><?=form_error('nama_prodi'); ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama_jurusan">Nama Jurusan :</label>
                      <select name="nama_jurusan" id="nama_jurusan" class="form-control">
                        <option value="<?=$prd->nama_jurusan; ?>"><?=$prd->nama_jurusan; ?></option>
                        <?php foreach ($jurusan as $jrs): ?>
                          <option value="<?=$jrs->nama_jurusan; ?>"><?=$jrs->nama_jurusan; ?></option>
                        <?php endforeach ?>
                      </select>
                      <small class="form-text text-danger"><?=form_error('nama_jurusan'); ?></small>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit" onclick="return confirm('Apakah ada yakin ingin Simpan data ini?')">Simpan</button>
                    </div>     
                  </form>
                <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>