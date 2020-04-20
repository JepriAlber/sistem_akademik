<?php  
/**
 * 
 */
class Mahasiswa extends CI_Controller
{
	
	public function index()
	{

		$data['mahasiswa']		= $this->Mahasiswa_model->Tampil_data('mahasiswa')->result();
		$datajudul['judul']		= 'Mahasiswa';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/mahasiswa',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function details($id)
	{

		$data['details']		= $this->Mahasiswa_model->Ambil_data_mahasiswa($id);
		$datajudul['judul']		= 'Details Mahasiswa';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/details_mahasiswa',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input()
	{
		$data['prodi']		=$this->Mahasiswa_model->Tampil_data('prodi')->result();
		$datajudul['judul']		= 'Tambah Mahasiswa';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_mahasiswa',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		} else {
			$npm				= $this->input->post('npm',TRUE);
			$nama_lengkap		= $this->input->post('nama_lengkap',TRUE);
			$alamat				= $this->input->post('alamat',TRUE);
			$email				= $this->input->post('email',TRUE);
			$telepon			= $this->input->post('telepon',TRUE);
			$tempat_lahir		= $this->input->post('tempat_lahir',TRUE);
			$tanggal_lahir		= $this->input->post('tanggal_lahir',TRUE);
			$jenis_kelamin		= $this->input->post('jenis_kelamin',TRUE);
			$nama_prodi			= $this->input->post('nama_prodi',TRUE);
			$photo				= $_FILES['photo'];
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
 				redirect('admin/mahasiswa');die();
					} else {
						$photo 	= $this->upload->data('file_name');
					}
					
				}
			$data 	= array(
				'npm'				=> $npm,
				'nama_lengkap'		=> $nama_lengkap,
				'alamat'			=> $alamat,
				'email'				=> $email,
				'telepon'			=> $telepon,
				'tempat_lahir'		=> $tempat_lahir,
				'tanggal_lahir'		=> $tanggal_lahir,
				'jenis_kelamin'		=> $jenis_kelamin,
				'nama_prodi'		=> $nama_prodi,
				'photo'				=> $photo

			);

			$this->Mahasiswa_model->Insert_data($data,'mahasiswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Mahasiswa Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/mahasiswa');
		}
		
	}

	public function edit($id)
	{
		$where		= array('id' => $id);

			$data['mahasiswa']		= $this->db->query("SELECT * FROM mahasiswa mhs, prodi prd WHERE mhs.nama_prodi=prd.nama_prodi AND mhs.id='$id'")->result();
			$data['prodi']			= $this->Matakuliah_model->Tampil_data('prodi')->result();
			$data['details']			= $this->Mahasiswa_model->Ambil_data_mahasiswa($id);

			$datajudul['judul']		= 'Edit Mahasiswa';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_mahasiswa',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function update_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) 
			{
				$this->edit();
			} else {
				$id 				= $this->input->post('id',TRUE);
				$npm				= $this->input->post('npm',TRUE);
				$nama_lengkap		= $this->input->post('nama_lengkap',TRUE);
				$alamat				= $this->input->post('alamat',TRUE);
				$email				= $this->input->post('email',TRUE);
				$telepon			= $this->input->post('telepon',TRUE);
				$tempat_lahir		= $this->input->post('tempat_lahir',TRUE);
				$tanggal_lahir		= $this->input->post('tanggal_lahir',TRUE);
				$jenis_kelamin		= $this->input->post('jenis_kelamin',TRUE);
				$nama_prodi			= $this->input->post('nama_prodi',TRUE);
				$photo				= $_FILES['userfile']['name'];

					if ($photo){
					$config['upload_path']			= './assets/uploads';
					$config['allowed_types']		= 'png|jpg|gif|tiff';

					$this->load->library('upload', $config);
					if ($this->upload->do_upload('userfile')) {
						$userfile = $this->upload->data('file_name');
						$this->db->set('photo',$userfile);
					} else {
						$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
				              <strong>Gagal Mengupload Foto</strong>
				              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>'); 
		 				redirect('admin/mahasiswa');
					}
					 
				}

				$data 	= array(
				'npm'				=> $npm,
				'nama_lengkap'		=> $nama_lengkap,
				'alamat'			=> $alamat,
				'email'				=> $email,
				'telepon'			=> $telepon,
				'tempat_lahir'		=> $tempat_lahir,
				'tanggal_lahir'		=> $tanggal_lahir,
				'jenis_kelamin'		=> $jenis_kelamin,
				'nama_prodi'		=> $nama_prodi
				);

				$where 	= array(
					'id'=>$id
				);

			$this->Mahasiswa_model->Update_data($where,$data,'mahasiswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Mahasiswa Berhasil DiUpdate</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/mahasiswa');
			
			}
			
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->Mahasiswa_model->Hapus_data($where,'mahasiswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Mahasiswa Berhasil DiHapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/mahasiswa');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('npm','NPM','required',[
			'required'=>'NPM wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required',[
			'required'=>'Nama Lengkap wajib diisi!'
		]);
		$this->form_validation->set_rules('alamat','Alamat','required',[
			'required'=>'Alamat wajib diisi!'
		]);
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',[
			'required'=>'Tempat Lahir wajib diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',[
			'required'=>'Tanggal Lahir wajib diisi!'
		]);
		$this->form_validation->set_rules('email','Email','required',[
			'required'=>'Email wajib diisi!'
		]);
		$this->form_validation->set_rules('telepon','Nomor Telepon','required',[
			'required'=>'Nomor Telepon wajib diisi!'
		]);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',[
			'required'=>'Jenis Kelamin wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_prodi','Nama Prodi','required',[
			'required'=>'Nama Prodi wajib diisi!'
		]);
	}

}
?>