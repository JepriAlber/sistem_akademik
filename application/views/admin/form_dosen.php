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
              <h4>Tambah Dosen</h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('admin/dosen/input_aksi');?>
                <div class="form-group">
                  <label for="photo">Pas Poto :</label>
                  <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <div class="form-group">
                  <label for="nidn">NIDN :</label>
                  <input type="number" name="nidn" class="form-control " id="nidn">
                   <small class="form-text text-danger"><?=form_error('nidn'); ?></small>
                </div>
                <div class="form-group">
                  <label for="nama_dosen">Nama Dosen :</label>
                  <input type="text" name="nama_dosen" class="form-control " id="nama_dosen">
                  <small class="form-text text-danger"><?=form_error('nama_dosen'); ?></small>
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
                <div class="form-group">
                  <label for="email">Email :</label>
                  <input type="email" name="email" class="form-control " id="email">
                  <small class="form-text text-danger"><?=form_error('email'); ?></small>
                </div>
                <div class="form-group">
                  <label for="telp">Nomor Telepon :</label>
                  <input type="number" name="telp" class="form-control " id="telp">
                  <small class="form-text text-danger"><?=form_error('telp'); ?></small>
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