<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Pesan User</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Balas Pesan User</h4>
            </div>
            <div class="card-body">
                <?php foreach ($hubungi as $hub): ?>
                  <form action="<?=base_url('admin/hubungi/balas_email_aksi')?>" method="POST">
                    <div class="form-group">
                      <label for="email">Email :</label>
                      <input type="hidden" name="id_hubungi" value="<?=$hub->id_hubungi ?>">
                      <input type="email" name="email" class="form-control " id="email" value="<?=$hub->email ?>" readonly>
                       <small class="form-text text-danger"><?=form_error('kode_prodi'); ?></small>
                    </div>
                    <div class="form-group">
                      <label for="subject">Subject :</label>
                      <input type="text" name="subject" class="form-control " id="subject">
                      <small class="form-text text-danger"><?=form_error('subject'); ?></small>
                    </div>
                    <div class="form-group">
                      <label for="pesan">Pesan :</label>
                      <textarea name="pesan" class="form-control " id="pesan"></textarea>
                      <small class="form-text text-danger"><?=form_error('pesan'); ?></small>
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