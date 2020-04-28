<?php  

	$nilai 	= get_instance();
	$nilai->load->model('Matakuliah_model');
	$nilai->load->model('TahunAkademik_model');

?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Halaman Input Nilai</h1>
    </div>
    <div class="section-body">
  
    	<?php  
    			if ($list_nilai == NULL) {
    				$thn 		= $nilai->TahunAkademik_model->get_by_id($id_ta);
    				$semester	= $thn->semester == 1;
    					if ($semester == 1) {
    						$tampilSemester = 'Ganjil';
    					} else {
    						$tampilSemester = 'Genap';
    					} ?>

    					<div class="row">
				        <div class="col-12 col-md-6 col-lg-12">
				          <div class="card">
				            <div class="card-header">
				              <h4>Halama Input Nilai</h4>
				            </div>
				            <div class="card-body">
				                <div class="alert alert-danger">
			    					Maap, Kode Mata Kuliah yang anda input <strong>TIDAK TERSEDIA!</strong> di tahun ajaran <strong><?=$thn->tahun_akademik; ?>/<?=$tampilSemester; ?></strong>
			    				</div>
			    				<div class="card-footer text-right">
				                    	<?=anchor('admin/nilai/input_nilai','<div class="btn btn-sm btn-primary">Kembali</div>'); ?>
				                 </div>  
	                	
				              </div>
				          </div>
				        </div>
				      </div>
    				
    		<?php	} else { ?>
    				<div class="row">
				        <div class="col-12 col-md-6 col-lg-12">
				          <div class="card">
				            <div class="card-header">
				              <h4>Masukan Nilai Akhir</h4>
				            </div>
				            <div class="card-body">
				            	<table>
				            		<tr>
				            			<td width="200"> Kode Mata kuliah</td>
				            			<td width="10">:</td>
				            			<td width="250"><?=$kode_matakuliah ?></td>
				            		</tr>
				            		<tr>
				            			<td width="200"> Nama Mata Kuliah</td>
				            			<td width="10">:</td>
				            			<td width="250"><?=$nilai->Matakuliah_model->get_by_id($kode_matakuliah)->nama_matakuliah; ?></td>
				            		</tr>
				            		<tr>
				            			<td width="200"> SKS</td>
				            			<td width="10">:</td>
				            			<td width="250"><?=$nilai->Matakuliah_model->get_by_id($kode_matakuliah)->sks; ?></td>
				            		</tr>
				            		<tr>
				            			<?php
				            				$thn 		= $nilai->TahunAkademik_model->get_by_id($id_ta);
				            				$semester 	= $thn->semester==1;
				            					if ($semester ==1) {
				            						$tampilSemester = 'Ganjil';
				            					} else {
				            						$tampilSemester = 'Genap';
				            					}
				            					
				            			 ?>
				            			<td width="200"> Tahun Akademik (Semester)</td>
				            			<td width="10">:</td>
				            			<td width="250"><?=$thn->tahun_akademik; ?>(<?=$tampilSemester; ?>)</td>
				            		</tr>
				            	</table>

				                <form action="<?=base_url('admin/nilai/simpan_nilai')?>" method="POST">

				                <div class="table-responsive">
				                	<table class="table table-striped table-md" id="table-1">
				                		<thead>
				                			<tr>
				                				<td>No</td>
				                				<td>NPM</td>
				                				<td>NAMA MAHASISWA</td>
				                				<td>NILAI</td>
				                			</tr>
				                		</thead>
				                		<tbody>
				                			<?php
				                			$no = 1; 
				                			foreach ($list_nilai as $data): ?>
				                			<tr>
				                				<td><?=$no++; ?></td>
				                				<td><?=$data->npm; ?></td>
				                				<td><?=$data->nama_lengkap;?></td>
				                				<input type="hidden" name="id_krs[]" value="<?=$data->id_krs; ?>">
				                				<td width="150px"><input type="text" name="nilai[]" class="form-control" value="<?=$data->nilai; ?>"></td>
				                			</tr>	
				                			<?php endforeach ?>
				                		</tbody>
				                	</table>
				                </div>

				                	<div class="card-footer text-right">
				                    	<button class="btn btn-primary mr-1" type="submit">Simpan</button>
				                  	</div>     
				                </form>
				              </div>
				          </div>
				        </div>
				      </div>
    		<?php	}
    			
    	?>
    </div>
  </section>
</div>