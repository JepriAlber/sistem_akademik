<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Identitas</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Data Identitas</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      	<th>NO </th>
  		                      	<th>NAMA WEBSITE</th>
  		                      	<th>EMAIL</th>
                            	<th>ALAMAT</th>
                            	<th>NO HP</th>
  		                     	<th class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
		                     <?php
                            $no=1; 
                            foreach ($identitas as $iden): 
                          ?> 
		                    	<tr>
			                      <th width="20px"><?=$no++; ?></th>
			                      <td><?=$iden->judul_website; ?></td>
			                      <td><?=$iden->email; ?></td>
                            	  <td><?=$iden->alamat; ?></td>
                            	  <td><?=$iden->telp; ?></td>
			                      <td width="20px">
			                      	<?=anchor('admin/identitas/update/'.$iden->id_identitas, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?>	
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

