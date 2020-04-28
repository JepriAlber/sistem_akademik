<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Masuk Ke Halaman Input Nilai</h1>
    </div>

    <div class="section-body">
      <?=$this->session->flashdata('pesan'); ?>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Masuk ke Halama Input Nilai</h4>
            </div>
            <div class="card-body">
                <form action="<?=base_url('admin/nilai/input_nilai_aksi')?>" method="POST">

                  <div class="form-group">
                  <label for="kode_matakuliah">Kode Matakuliah :</label>
                  <input type="text" name="kode_matakuliah" class="form-control " id="kode_matakuliah">
                  <small class="form-text text-danger"><?=form_error('kode_matakuliah'); ?></small>
                </div>

                <div class="form-group">
                  <label for="id_ta">Tahun Akademik / Semester :</label>
                  <?php  
                    $query      = $this->db->query('SELECT id_ta, semester,CONCAT(tahun_akademik,"/") AS thn_semester FROM tahun_akademik');
                    $dropdowns   = $query->result(); 
                        foreach ($dropdowns as $dropdown) {
                              
                              if ($dropdown->semester === 1) {
                                    $tampilSemester   = 'Ganjil';
                              } else {
                                    $tampilSemester   = 'Genap';
                              }
                            $dropDownList[$dropdown->id_ta] = $dropdown->thn_semester." ".$tampilSemester;
                        }

                         echo form_dropdown('id_ta',$dropDownList,'', 'class="form-control" id="id_ta"');
                  ?>
                  <small class="form-text text-danger"><?=form_error('id_ta'); ?></small>
                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Proses</button>
                  </div>     
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>