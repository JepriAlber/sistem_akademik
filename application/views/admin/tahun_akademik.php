<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <i class="fas fa-university mr-2"></i><h1> Tahun Akademik</h1>
          </div>

          <div class="section-body">
             <?=$this->session->flashdata('pesan'); ?>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4 class="d-inline">Data Tahun Akademik</h4>
                    <div class="card-header-action">
                      <?=anchor('admin/TahunAkademik/input','<div class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"> Tambah Tahun Akademik</i></div>')  ?>
                </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-striped table-md" id="table-1">
                        <thead>
                           <tr>
  		                      <th>NO </th>
  		                      <th>TAHUN AKADEMIK</th>
  		                      <th>SEMESTER</th>
                            <th>STATUS</th>
  		                      <th colspan="2" class="text-center">OPTION</th>
  		                    </tr>
                 		 </thead>
		                  <tbody>
		                     <?php
                            $no=1; 
                            foreach ($tahunakademik as $tmik): 
                          ?> 
		                    	<tr>
			                      <th width="20px"><?=$no++; ?></th>
			                      <td><?=$tmik->tahun_akademik; ?></td>
			                      <td><?=$tmik->semester; ?></td>
                            <td><?=$tmik->status; ?></td>
			                      <td width="20px">
			                      	<?=anchor('admin/tahunakademik/edit/'.$tmik->id, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</div>')?>	
			                      </td>
                            <td width="20px">
                              <?=anchor('admin/tahunakademik/hapus/'.$tmik->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</div>')?> 
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

