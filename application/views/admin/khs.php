<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Kartu Hasil Studi (KHS)</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Kartu Hasil Studi</h4>
                  </div>
                  <div class="card-body">
                      <table>
                          <tr>
                            <td width="150"><strong>NPM</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$mhs_npm; ?></td>
                          </tr>
                          <tr>
                            <td width="150"><strong>Nama Lengkap</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$mhs_nama; ?></td>
                          </tr>
                          <tr>
                            <td width="150"><strong>Program Studi</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$mhs_prodi; ?></td>
                          </tr>
                          <tr>
                            <td width="150"><strong>Tahun Akademik</strong></td>
                            <td width="10"> : </td>
                            <td width="250"><?=$tahun_akademik; ?></td>
                          </tr>
                      </table>
                      <div class="card-header-action">
                      <?=anchor('admin/khs/print','<div class="btn btn-sm btn-info shadow-sm float-right mr-2 mb-2"><i class="fas fa-print fa-sm"> Print KHS</i></div>')  ?>
                    </div>
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
                        foreach ($mhs_data as $mdata): ?>
                          <tr>
                            <td width="20px"><?=$no++;?></td>
                            <td><?=$mdata->kode_matakuliah; ?></td>
                            <td><?=$mdata->nama_matakuliah; ?></td>
                            <td><?=$mdata->sks; ?></td>
                            <td><?=$mdata->nilai; ?></td>
                            <td><?=skorNilai($mdata->nilai,$mdata->sks);?></td>
                              <?php
                                $jumlahSks+=$mdata->sks;
                                $jumlahNilai+=skorNilai($mdata->nilai,$mdata->sks);
                              ?>
                          </tr>
                        <?php endforeach ?>
                        <tr>
                          <td colspan="3">Jumlah</td>
                          <td><?=$jumlahSks; ?></td>
                          <td><?=$jumlahNilai; ?></td>
                        </tr>
                      </tbody>
                      </table>
                      Index Prestasi : <?=number_format($jumlahNilai/$jumlahSks,2); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

