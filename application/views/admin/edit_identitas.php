<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Identitas</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Identitas</h4>
            </div>
            <div class="card-body">
                <?php foreach ($identitas as $iden): ?>
                  <form action="<?=base_url('admin/identitas/update_identitas_aksi')?>" method="POST">
                <div class="form-group">
                  <label for="judul_website">Nama Website:</label>
                  <input type="hidden" name="id_identitas" value="<?=$iden->id_identitas;?>">
                  <input type="text" name="judul_website" class="form-control " id="judul_website"  value="<?=$iden->judul_website;?>">
                   <small class="form-text text-danger"><?=form_error('judul_website'); ?></small>
                </div>
                <div class="form-group">
                  <label for="email">Email :</label>
                  <input type="email" name="email" class="form-control " id="email" value="<?=$iden->email;?>">
                  <small class="form-text text-danger"><?=form_error('email'); ?></small>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat :</label>
                  <textarea id="alamat" name="alamat" class="form-control"><?=$iden->alamat; ?></textarea>
                </div>
                <div class="form-group">
                  <label>No.Telepon :</label>
                  <input type="telp" name="telp" id="telp" class="form-control" value="<?=$iden->telp; ?>">
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
    </div>
  </section>
</div>