<?php  
/**
 * 
 */
class Dosen extends CI_Controller
{
	
	public function index()
	{

		$data['dosen']			= $this->Dosen_model->Tampil_data('dosen')->result();
		$datajudul['judul']		= 'Dosen';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/dosen',$data);
 			$this->load->view('includesAdmin/footer');
	
	}

	public function details($id)
	{

		$data['details']		= $this->Dosen_model->Ambil_data_dosen($id);
		$datajudul['judul']		= 'Details Mahasiswa';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/details_dosen',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input()
	{
		$datajudul['judul']		= 'Tambah Data Dosen';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_dosen');
 			$this->load->view('includesAdmin/footer');	
	}

	public function input_aksi()
	{

		$this->_rulesDosen();

		if ($this->form_validation->run() == FALSE) {
			print_r($_POST);die();
			$this->input();
		} else {
			
			$nidn			= $this->input->post('nidn',TRUE);
			$nama_dosen		= $this->input->post('nama_dosen',TRUE);
			$jenis_kelamin	= $this->input->post('jenis_kelamin',TRUE);
			$email 			= $this->input->post('email', TRUE);
			$telp			= $this->input->post('telp',TRUE);
			$alamat			= $this->input->post('alamat',TRUE);
			$photo			= $_FILES['photo'];

				if ($photo='') {} else {
					$config['upload_path']			= './assets/uploads';
					$config['allowed_types']		= 'png|jpg|gif|tiff|jpeg|image';

					$this->load->library('upload', $config);
					if (! $this->upload->do_upload('photo')) {
						$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
		              <strong>Gagal Mengupload Foto</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/dosen');die();
					} else {
						$photo 	= $this->upload->data('file_name');
					}
					
				}
			$data 	= array(
				'nidn'				=> $nidn,
				'nama_dosen'		=> $nama_dosen,
				'alamat'			=> $alamat,
				'email'				=> $email,
				'telp'				=> $telp,
				'jenis_kelamin'		=> $jenis_kelamin,
				'photo'				=> $photo

			);

			$this->Dosen_model->Insert_data($data,'dosen');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data dosen Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/dosen');
		}
		
	}

	public function _rulesDosen()
	{
		$this->form_validation->set_rules('nidn','NIDN','required',[
			'required'=>'NIDN wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_dosen','Nama Dosen','required',[
			'required'=>'Nama Dosen wajib diisi!'
		]);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',[
			'required'=>'Jenis Kelamin wajib diisi!'
		]);
		$this->form_validation->set_rules('alamat','Alamat','required',[
			'required'=>'Alamat wajib diisi!'
		]);
		$this->form_validation->set_rules('email','Email','required',[
			'required'=>'Email wajib diisi!'
		]);
		$this->form_validation->set_rules('telp','Nomor Telepon','required',[
			'required'=>'Nomor Telepon wajib diisi!'
		]);
		
	}

	public function hapus($id)
	{
		$where = array('id_dosen' => $id);
		$this->Dosen_model->Hapus_data($where,'dosen');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Dosen Berhasil DiHapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/dosen');
	}

}
?> 