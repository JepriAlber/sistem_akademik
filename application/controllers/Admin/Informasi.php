<?php  
/**
 * 
 */
class Informasi extends CI_Controller
{
	
	public function index()
	{
		$data['informasi'] 			= $this->Informasi_model->Tampil_data()->result();
		$datajudul['judul']			= 'Informasi Kampus';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/informasi',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function tambah()
	{
		$datajudul['judul']			= 'Tambah Informasi';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_informasi');
 			$this->load->view('includesAdmin/footer');
	}

	public function tambah_aksi()
	{
		$this->_rulesIformasi();

			if ($this->form_validation->run() == FALSE) {
				$this->tambah();
			} else {

				$data 				= array(
					'icon'				=> $this->input->post('icon',TRUE),
					'judul_informasi'	=> $this->input->post('judul_informasi',TRUE),
					'isi_informasi'		=> $this->input->post('isi_informasi')
				);

				$this->Informasi_model->Tambah_data($data);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Informasi Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/informasi');

			}
			
	}

	public function _rulesIformasi()
	{
		$this->form_validation->set_rules('icon','ICON','required',[
			'required' 	=> 'ICON Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('judul_informasi','Judul Informasi','required',[
			'required' 	=> 'Judul Informasi Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('isi_informasi','Isi Informasi','required',[
			'required' 	=> 'Isi Informasi Tidak Boleh Kosong!'
		]);
	}

	public function edit($id)
	{
		$data['informasi']			= $this->Informasi_model->Ambil_data($id)->result();
		$datajudul['judul']			= 'Tambah Informasi';
			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_informasi',$data);
 			$this->load->view('includesAdmin/footer');

	}

	public function edit_aksi()
	{
		$this->_rulesIformasi();

			if ($this->form_validation->run() == FALSE) {
				$this->edit($this->input->post('id',TRUE));
			} else {
				
				$data 			= array(
					'icon'				=> $this->input->post('icon',TRUE),
					'judul_informasi' 	=> $this->input->post('judul_informasi',TRUE),
					'isi_informasi'		=> $this->input->post('isi_informasi',TRUE)
				);

				$where			= array(
					'id_informasi'		=> $this->input->post('id',TRUE)
				);

				$this->Informasi_model->Update_data($data,$where);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Informasi Berhasil DiUpdate</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/informasi');
			}
			
	}

	public function hapus($id)
	{
		$this->Informasi_model->Hapus_data($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Informasi Berhasil DiHapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/informasi');
	}

}
?>