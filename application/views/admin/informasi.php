<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-users mr-2"></i><h1> Informasi Kampus</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Data Informasi</h4>
                    <div class="card-header-action">
                      <?=anchor('admin/Informasi/tambah','<div class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"> Tambah Informasi</i></div>')  ?>
                </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>ICON</th>
  		                      <th>JUDUL INFORMASI</th>
                            <th>ISI INFORMASI</th>
  		                      <th colspan="2" class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
		                     <?php
                            $no=1; 
                            foreach ($informasi as $info): 
                          ?> 
		                    	<tr>
			                      <th width="20px"><?=$no++; ?></th>
			                      <td><?=$info->icon; ?></td>
			                      <td><?=$info->judul_informasi; ?></td>
                            <td><?=$info->isi_informasi; ?></td>
			                      <td width="20px">
			                      	<?=anchor('admin/informasi/edit/'.$info->id_informasi, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?>	
			                      </td>
                            <td width="20px" onclick="return confirm('Apakah ada yakin ingin Menghapus data ini?')">
                              <?=anchor('admin/informasi/hapus/'.$info->id_informasi, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</div>')?> 
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

