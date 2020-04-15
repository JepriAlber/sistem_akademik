<?php  
/**
 * 
 */
class Matakuliah extends CI_Controller
{
	
	public function index()
	{
		$datajudul['judul']		= 'Matakuliah';

		$data['matakuliah']		= $this->Matakuliah_model->Tampil_data('matakuliah')->result();

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/matakuliah',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input()
	{
		$data['prodi']		= $this->Matakuliah_model->Tampil_data('prodi')->result();
		$datajudul['judul']		= 'Tambah Matakuliah';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_matakuliah',$data);
 			$this->load->view('includesAdmin/footer');	
	}

	public function input_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->input();
			} else {
				$kode_matakuliah		= $this->input->post('kode_matakuliah',TRUE);
				$nama_matakuliah		= $this->input->post('nama_matakuliah',TRUE);
				$sks					= $this->input->post('sks',TRUE);
				$semester				= $this->input->post('semester',TRUE);
				$nama_prodi				= $this->input->post('nama_prodi',TRUE);

					$data = array(
						'kode_matakuliah'	=> $kode_matakuliah,
						'nama_matakuliah'	=> $nama_matakuliah,
						'sks'				=> $sks,
						'semester'			=> $semester,
						'nama_prodi'		=> $nama_prodi
					);

				$this->Matakuliah_model->Insert_data($data,'matakuliah');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Matakuliah Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/matakuliah');
			}		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_matakuliah','Kode mata kuliah','required',[
			'required'=>'Kode Mata Kuliah Wajib Diisi!'
		]);
		$this->form_validation->set_rules('nama_matakuliah','Nama mata kuliah','required',[
			'required'=>'Nama Mata Kuliah Wajib Diisi!'
		]);
		$this->form_validation->set_rules('sks','sks','required',[
			'required'=>'SKS Wajib Diisi!'
		]);
		$this->form_validation->set_rules('semester','semester','required',[
			'required'=>'Semester Wajib Diisi!'
		]);
		$this->form_validation->set_rules('nama_prodi','Nama prodi','required',[
			'required'=>'Nama Prodi Wajib Diisi!'
		]);
	}

}
?>