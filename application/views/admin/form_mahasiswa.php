<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-users mr-2"></i><h1> Mahasiswa</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Mahasiswa</h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('admin/mahasiswa/input_aksi');?>
                <div class="form-group">
                  <label for="photo">Pas Poto :</label>
                  <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <div class="form-group">
                  <label for="npm">NPM :</label>
                  <input type="number" name="npm" class="form-control " id="npm">
                   <small class="form-text text-danger"><?=form_error('npm'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap :</label>
                  <input type="text" name="nama_lengkap" class="form-control " id="nama_lengkap">
                  <small class="form-text text-danger"><?=form_error('nama_lengkap'); ?></small>
                </div>
                <div class="form-group">
                  <label for="Jenis_kelamin">Jenis Kelamin :</label>
                  <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                    <option value="">-Pilih-</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <small class="form-text text-danger"><?=form_error('jenis_kelamin'); ?></small>
                </div>
                <div class="form-group form-row">
                  <div class="col">
                    <label for="tempat_lahir">Tempat Lahir :</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                    <small class="form-text text-danger"><?=form_error('tempat_lahir'); ?></small>
                  </div>
                  <div class="col">
                    <label for="tanggal_lahir">Tgl. Lahir :</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                    <small class="form-text text-danger"><?=form_error('tanggal_lahir'); ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email :</label>
                  <input type="email" name="email" class="form-control " id="email">
                  <small class="form-text text-danger"><?=form_error('email'); ?></small>
                </div>
                <div class="form-group">
                  <label for="telepon">Nomor Telepon :</label>
                  <input type="number" name="telepon" class="form-control " id="telepon">
                  <small class="form-text text-danger"><?=form_error('telepon'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nama_prodi">Program Studi :</label>
                  <select id="nama_prodi" name="nama_prodi" class="form-control">
                    <option value="">-Pilih-</option>
                    <?php foreach ($prodi as $prd): ?>
                      <option value="<?=$prd->nama_prodi; ?>"><?=$prd->nama_prodi; ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="form-text text-danger"><?=form_error('nama_prodi'); ?></small>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat :</label>
                  <textarea id="alamat" class="form-control" name="alamat"></textarea>
                  <small class="form-text text-danger"><?=form_error('alamat'); ?></small>
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