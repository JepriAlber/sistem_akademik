<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-eye mr-2"></i><h1> Mata Kuliah</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Details Mata Kuliah</h4>
            </div>
            <div class="card-body">
                <table border="0">
                  <?php foreach ($details as $detail): ?>
                    <tr>
                      <td width="150">Kode Mata Kuliah</td>
                      <td width="10">:</td>
                      <td width="250"><?=$detail->kode_matakuliah; ?></td>
                    </tr>
                    <tr>
                      <td width="150">Nama Mata Kuliah</td>
                      <td width="10">:</td>
                      <td width="250"><?=$detail->nama_matakuliah; ?></td>
                    </tr>
                    <tr>
                      <td width="150">SKS</td>
                      <td width="10">:</td>
                      <td width="250"><?=$detail->sks; ?></td>
                    </tr>
                    <tr>
                      <td width="150">Semester</td>
                      <td width="10">:</td>
                      <td width="250"><?=$detail->semester; ?></td>
                    </tr>
                    <tr>
                      <td width="150">Nama Program Studi</td>
                      <td width="10">:</td>
                      <td width="250"><?=$detail->nama_prodi; ?></td>
                    </tr>
                  <?php endforeach ?>
                </table>
                <div class="card-footer text-right">
                <a href="<?=base_url('admin/matakuliah') ?>" class="btn btn-sm btn-primary">Kembali</a>  
                </div>
                
          </div>
        </div>
      </div>
    </div>
  </section>
</div>