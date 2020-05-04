<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-users mr-2"></i><h1> Dosen</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Dosen</h4>
            </div>
            <div class="card-body">
               <?php foreach ($dosen as $dsn): ?>
                  <?php echo form_open_multipart('admin/dosen/update_aksi');?>
                <div class="form-group">
                    <img src="<?=base_url().'assets/uploads/'.$dsn->photo; ?>" width="250">
                  <div class="form-group">
                    <label for="userfile">Pas Poto :</label>
                  <input type="file" name="userfile" id="userfile" class="form-control" value="<?=$dsn->photo; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nidn">nidn :</label>
                  <input type="hidden" name="id_dosen" class="form-control" value="<?=$dsn->id_dosen; ?>">
                  <input type="number" name="nidn" class="form-control " id="nidn" value="<?=$dsn->nidn; ?>">
                   <small class="form-text text-danger"><?=form_error('nidn'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nama_dosen">Nama Lengkap :</label>
                  <input type="text" name="nama_dosen" class="form-control " id="nama_dosen" value="<?=$dsn->nama_dosen; ?>">
                  <small class="form-text text-danger"><?=form_error('nama_dosen'); ?></small>
                </div>
                <div class="form-group">
                  <label for="Jenis_kelamin">Jenis Kelamin :</label>
                  <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                    <option value="<?=$dsn->jenis_kelamin; ?>"><?=$dsn->jenis_kelamin; ?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <small class="form-text text-danger"><?=form_error('jenis_kelamin'); ?></small>
                </div>
                <div class="form-group">
                  <label for="email">Email :</label>
                  <input type="email" name="email" class="form-control " id="email" value="<?=$dsn->email; ?>">
                  <small class="form-text text-danger"><?=form_error('email'); ?></small>
                </div>
                <div class="form-group">
                  <label for="telp">Nomor Telepon :</label>
                  <input type="number" name="telp" class="form-control " id="telp" value="<?=$dsn->telp; ?>">
                  <small class="form-text text-danger"><?=form_error('telp'); ?></small>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat :</label>
                  <textarea id="alamat" class="form-control" name="alamat"><?=$dsn->alamat; ?></textarea>
                  <small class="form-text text-danger"><?=form_error('alamat'); ?></small>
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