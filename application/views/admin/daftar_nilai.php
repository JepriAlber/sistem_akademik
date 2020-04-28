<?php  
	$nilai 	= get_instance();
	$nilai->load->model('Krs_model');
	$nilai->load->model('Mahasiswa_model');
	$nilai->load->model('Matakuliah_model');
	$nilai->load->model('TahunAkademik_model');

	$krs 				= $nilai->Krs_model->get_by_id($id_krs[0]);
	$kode_matakuliah 	= $krs->kode_matakuliah;
	$id_ta 				= $krs->id_ta;
?>
<?php  

	$nilai 	= get_instance();
	$nilai->load->model('Matakuliah_model');
	$nilai->load->model('TahunAkademik_model');

?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <i class="fas fa-university mr-2"></i><h1> Daftar Nilai Mahasiswa</h1>
    </div>
    <div class="section-body">
  
    				<div class="row">
				        <div class="col-12 col-md-6 col-lg-12">
				          <div class="card">
				            <div class="card-header">
				              <h4>Daftar Nilai Mahasiswa</h4>
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
				                			for($i=0; $i<sizeof($id_krs);$i++): ?>
				                			<tr>
				                				<td><?=$no++; ?></td>
				                				<?php $npm = $nilai->Krs_model->get_by_id($id_krs[$i])->npm; ?>
				                				<td><?=$npm; ?></td>
				                				<td><?=$nilai->Mahasiswa_model->get_by_id($npm)->nama_lengkap;?></td>
				                				<td><?=$nilai->Krs_model->get_by_id($id_krs[$i])->nilai;?></td>
				                			</tr>	
				                			<?php endfor ?>
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