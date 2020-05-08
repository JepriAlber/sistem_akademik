<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Tentang Kampus</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Tentang Kampus</h4>
            </div>
            <div class="card-body">
                <?php foreach ($tentang as $ttg): ?>
                  <form action="<?=base_url('admin/tentangkampus/update_tentang_aksi')?>" method="POST">
                <div class="form-group">
                  <label for="sejarah">Sejarah :</label>
                  <input type="hidden" name="id" value="<?=$ttg->id;?>">
                   <textarea id="sejarah" name="sejarah" class="form-control"><?=$ttg->sejarah; ?></textarea>
                   <small class="form-text text-danger"><?=form_error('sejarah'); ?></small>
                </div>
                <div class="form-group">
                  <label for="visi">Visi :</label>
                  <textarea id="visi" name="visi" class="form-control"><?=$ttg->visi; ?></textarea>
                  <small class="form-text text-danger"><?=form_error('visi'); ?></small>
                </div>
                <div class="form-group">
                  <label for="misi">Misi :</label>
                  <textarea id="misi" name="misi" class="form-control"><?=$ttg->misi; ?></textarea>
                  <small class="form-text text-danger"><?=form_error('misi'); ?></small>
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