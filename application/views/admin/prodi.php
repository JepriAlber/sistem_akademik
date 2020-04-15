<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Prodi</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Data Prodi</h4>
                    <div class="card-header-action">
                      <?=anchor('admin/prodi/Tambah_prodi','<div class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"> Tambah Prodi</i></div>')  ?>
                </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>KODE PRODI</th>
  		                      <th>NAMA PRODI</th>
                            <th>NAMA JURUSAN</th>
  		                      <th colspan="2" class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
		                     <?php
                            $no=1; 
                            foreach ($prodi as $pro): 
                          ?> 
		                    	<tr>
			                      <th width="20px"><?=$no++; ?></th>
			                      <td><?=$pro->kode_prodi; ?></td>
			                      <td><?=$pro->nama_prodi; ?></td>
                            <td><?=$pro->nama_jurusan; ?></td>
			                      <td width="20px">
			                      	<?=anchor('admin/prodi/update/'.$pro->id_prodi, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?>	
			                      </td>
                            <td width="20px">
                              <?=anchor('admin/prodi/hapus/'.$pro->id_prodi, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Details</div>')?> 
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

