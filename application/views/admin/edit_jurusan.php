<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Jurusan</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Jurusan</h4>
            </div>
            <div class="card-body">
                <?php foreach ($jurusan as $jrs): ?>
                  <form action="<?=base_url('admin/jurusan/edit_aksi')?>" method="POST">
                    <div class="form-group">
                      <label for="kode_jurusan">Kode Jurusan :</label>
                      <input type="hidden" name="id_jurusan" value="<?=$jrs->id_jurusan ?>">
                      <input type="text" name="kode_jurusan" class="form-control " id="kode_jurusan" value="<?=$jrs->kode_jurusan ?>">
                       <small class="form-text text-danger"><?=form_error('kode_jurusan'); ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama_jurusan">Nama Jurusan :</label>
                      <input type="text" name="nama_jurusan" class="form-control " id="nama_jurusan" value="<?=$jrs->nama_jurusan ?>">
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