<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> User</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Data User</h4>
                    <div class="card-header-action">
                      <?=anchor('admin/user/tambah_user','<div class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"> Tambah User</i></div>')  ?>
                </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>USER NAME</th>
  		                      <th>EMAIL</th>
                            <th>LEVEL</th>
                            <th>BLOKIR</th>
  		                      <th colspan="2" class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
		                     <?php
                            $no=1; 
                            foreach ($users as $user): 
                          ?> 
		                    	<tr>
			                      <th width="20px"><?=$no++; ?></th>
			                      <td><?=$user->username; ?></td>
			                      <td><?=$user->email; ?></td>
                            <td><?=$user->level; ?></td>
                            <td><?=$user->blokir; ?></td>
			                      <td width="20px">
			                      	<?=anchor('admin/user/update/'.$user->id, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?>	
			                      </td>
                            <td width="20px">
                              <?=anchor('admin/user/hapus/'.$user->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</div>')?> 
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

