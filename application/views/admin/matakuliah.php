<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Mata Kuliah</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Data Mata Kuliah</h4>
                    <div class="card-header-action">
                      <?=anchor('admin/matakuliah/input','<div class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"> Tambah Matakuliah</i></div>')  ?>
                </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>KODE MATAKULIAH</th>
  		                      <th>NAMA MATAKULIAH</th>
                            <th>PROGRAM STUDI</th>
  		                      <th colspan="3" class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
		                     <?php
                            $no=1; 
                            foreach ($matakuliah as $mk): 
                          ?> 
		                    	<tr>
			                      <th width="20px"><?=$no++; ?></th>
			                      <td><?=$mk->kode_matakuliah; ?></td>
			                      <td><?=$mk->nama_matakuliah; ?></td>
                            <td><?=$mk->nama_prodi; ?></td>
                            <td width="20px">
                              <?=anchor('admin/matakuliah/details/'.$mk->kode_matakuliah, '<div class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Details</div>')?> 
                            </td>
			                      <td width="20px">
			                      	<?=anchor('admin/matakuliah/edit/'.$mk->kode_matakuliah, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?>	
			                      </td>
                            <td width="20px">
                              <?=anchor('admin/matakuliah/hapus/'.$mk->kode_matakuliah, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</div>')?> 
                            </td>
		                    	</tr>
		                    <?php endforeach ?>
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

