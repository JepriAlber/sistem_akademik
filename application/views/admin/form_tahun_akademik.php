<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Tahun Akademik</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Tahun Akademik</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/tahunakademik/input_aksi')?>" method="POST">

                <div class="form-group">
                  <label for="tahun_akademik">Tahun Akademik :</label>
                  <input type="text" name="tahun_akademik" class="form-control " id="tahun_akademik">
                  <small class="form-text text-danger"><?=form_error('tahun_akademik'); ?></small>
                </div>

                <div class="form-group">
                  <label for="semester">Semester :</label>
                  <select name="semester" id="semester" class="form-control">
                    <option>-Pilih-</option>
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="status">Status :</label>
                  <select name="status" id="status" class="form-control">
                    <option>-Pilih-</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
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