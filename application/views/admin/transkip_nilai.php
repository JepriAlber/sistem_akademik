<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Transkrip Nilai</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Transkrip Nilai</h4>
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
                            <td width="250"><?=$nama; ?></td>
                          </tr>
                          <tr>
                            <td width="150"><strong>Program Studi</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$prodi; ?></td>
                          </tr>
                      </table>
                    <div class="table-responsive mt-2">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>KODE MATA KULIAH</th>
  		                      <th>NAMA MATA KULIAH</th>
                            <th>SKS</th>
                            <th>NILAI</th>
                            <th>SKOR</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
                        <?php 
                        $no           = 1;
                        $jumlahSks    = 0;
                        $jumlahNilai  = 0;
                        foreach ($transkrip as $data): ?>
                          <tr>
                            <td width="20px"><?=$no++;?></td>
                            <td><?=$data->kode_matakuliah; ?></td>
                            <td><?=$data->nama_matakuliah; ?></td>
                            <td><?=$data->sks; ?></td>
                            <td><?=$data->nilai; ?></td>
                            <td><?=skorNilai($data->nilai,$data->sks);?></td>
                              <?php
                                $jumlahSks+=$data->sks;
                                $jumlahNilai+=skorNilai($data->nilai,$data->sks);
                              ?>
                          </tr>
                        <?php endforeach ?>
                        <tr>
                          <td colspan="3">Jumlah</td>
                          <td><?=$jumlahSks; ?></td>
                          <td></td>
                          <td><?=$jumlahNilai; ?></td>
                        </tr>
                      </tbody>
                      </table>
                      <p>Index Prestasi : <?=number_format($jumlahNilai/$jumlahSks,2); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

