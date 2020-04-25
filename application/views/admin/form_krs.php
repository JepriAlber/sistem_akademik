<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Kartu Rencana Studi (KRS)</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Data KRS</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/krs/tambah_krs_aksi')?>" method="POST">
                <div class="form-group">
                  <label for="npm">NPM Mahasiswa :</label>
                  <input type="text" name="npm" class="form-control " id="npm" value="<?=$npm; ?>" readonly>
                   <small class="form-text text-danger"><?=form_error('npm'); ?></small>
                </div>
                <div class="form-group">
                  <label for="tahun_akademik">Tahun Akademik :</label>
                  <input type="hidden" name="id_ta" class="form-control" value="<?=$id_ta; ?>">
                  <input type="hidden" name="id_krs" class="form-control" value="<?=$id_krs; ?>">
                  <input type="text" name="tahun_akademik" class="form-control " id="tahun_akademik" value="<?=$tahun_akademik; ?>/<?=$semester; ?>">
                   <small class="form-text text-danger"><?=form_error('tahun_akademik'); ?></small>
                </div>
                <div class="form-group">
                  <label for="kode_matakuliah">Matakuliah :</label>
                  <?php 
                      $query      = $this->db->query('SELECT kode_matakuliah,nama_matakuliah FROM matakuliah');
                      $dropdowns  = $query->result();
                          foreach ($dropdowns as $dropdown) {
                            $dropDownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
                          }
                      echo form_dropdown('kode_matakuliah',$dropDownList,$kode_matakuliah,'class="form-control" id="kode_matakuliah"');
                   ?>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" onclick="return confirm('Apakah ada yakin ingin Simpan data ini?')">Simpan</button>
                    <?php echo anchor('admin/krs/krs_aksi','<div class="btn btn-warning">Kembali</div>'); ?>
                </div>     
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>