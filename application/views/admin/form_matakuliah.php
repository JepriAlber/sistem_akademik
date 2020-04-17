<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Mata Kuliah</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Mata Kuliah</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/matakuliah/input_aksi')?>" method="POST">
                <div class="form-group">
                  <label for="kode_matakuliah">Kode Mata Kuliah :</label>
                  <input type="text" name="kode_matakuliah" class="form-control " id="kode_matakuliah">
                   <small class="form-text text-danger"><?=form_error('kode_matakuliah'); ?></small>
                </div>

                <div class="form-group">
                  <label for="nama_matakuliah">Nama Mata Kuliah :</label>
                  <input type="text" name="nama_matakuliah" class="form-control " id="nama_matakuliah">
                  <small class="form-text text-danger"><?=form_error('nama_matakuliah'); ?></small>
                </div>

                <div class="form-group">
                  <label for="sks">SKS :</label>
                  <select name="sks" id="sks" class="form-control">
                    <option>-Pilih-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="semester">Semester :</label>
                  <select name="semester" id="semester" class="form-control">
                    <option>-Pilih-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">13</option>
                    <option value="14">14</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="nama_prodi">Nama Program Studi</label>
                  <select name="nama_prodi" class="form-control" id="nama_prodi">
                    <option>-Pilih-</option>
                    <?php foreach ($prodi as $prd):?>
                      <option value="<?=$prd->nama_prodi; ?>"><?=$prd->nama_prodi; ?></option>
                    <?php endforeach ?>
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