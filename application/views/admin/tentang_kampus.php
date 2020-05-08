<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Tentang Kampus</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Data Tentang Kampus</h4>
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>SEJARAH</th>
  		                      <th>VISI</th>
                            <th>MISI</th>
  		                      <th class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
		                     <?php
                            $no=1; 
                            foreach ($tentang as $ttg): 
                          ?> 
		                    	<tr>
			                      <th width="20px"><?=$no++; ?></th>
			                      <td><?=$ttg->sejarah; ?></td>
			                      <td><?=$ttg->visi; ?></td>
                            <td><?=$ttg->misi; ?></td>
			                      <td width="20px">
			                      	<?=anchor('admin/tentangkampus/update/'.$ttg->id, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?>	
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

