<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Kartu Rencana Studi (KRS)</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Kartu Rencana Studi</h4>
                  </div>
                  <div class="card-body">
                      <table>
                          <tr>
                            <td width="150"><strong>NPM</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$npm; ?></td>
                          </tr>
                          <tr>
                            <td width="150"><strong>Nama Lengkap</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$nama_lengkap; ?></td>
                          </tr>
                          <tr>
                            <td width="150"><strong>Program Studi</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$nama_prodi; ?></td>
                          </tr>
                          <tr>
                            <td width="150"><strong>Tahun Akademik</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$tahun_akademik; ?> (<?=$semester; ?>)</td>
                          </tr>
                      </table>
                      <div class="card-header-action">
                      <?=anchor('admin/krs/tambah_krs/'.$npm.'/'.$id_ta,'<div class="btn btn-sm btn-primary shadow-sm float-right mb-2"><i class="fas fa-plus fa-sm"> Tambah Data KRS</i></div>')  ?>
                      <?=anchor('admin/krs/print','<div class="btn btn-sm btn-info shadow-sm float-right mr-2"><i class="fas fa-print fa-sm"> Print KRS</i></div>')  ?>
                    </div>
                    <div class="table-responsive mt-2">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>KODE MATA KULIAH</th>
  		                      <th>NAMA MATA KULIAH</th>
                            <th>SKS</th>
  		                      <th colspan="2" class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
                        <?php 
                        $no         = 1;
                        $jumlahSks  = 0;
                        foreach ($krs_data as $krs): ?>
                          <tr>
                            <td width="20px"><?=$no++;?></td>
                            <td><?=$krs->kode_matakuliah; ?></td>
                            <td><?=$krs->nama_matakuliah; ?></td>
                            <td>
                              <?php echo $krs->sks; 
                                    $jumlahSks  +=$krs->sks;
                              ?>
                            </td>
                            <td width="20px">
                              <?=anchor('admin/krs/update/'.$krs->id_krs, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?> 
                            </td>
                            <td width="20px">
                              <?=anchor('admin/krs/hapus/'.$krs->id_krs, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</div>')?> 
                            </td>
                          </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="3" align="right"><strong>Jumlah SKS</strong></td>
                            <td><strong><?=$jumlahSks; ?></strong></td>
                        </tr>
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

