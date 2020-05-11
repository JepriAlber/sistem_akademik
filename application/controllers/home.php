<?php  
/**
 * 
 */
class Home extends CI_Controller
{
	
	public function index()
	{
		$data['identitas']		= $this->Identitas_model->Tampil_data()->result();
		$data['tentang']		= $this->TentangKampus_model->Tampil_data()->result();
		$data['informasi']		= $this->Informasi_model->Tampil_data()->result();
		$data['hubungi']		= $this->Hubungi_model->Tampil_data()->result();
			$this->load->view('home',$data);
	}

	public function kirim_pesan()
	{
		$this->_rules();

			if ($this->form_validation->run() ==  FALSE) {
				$this->index();
			} else {	
				$data 			= array(
					'nama'		=> $this->input->post('nama',TRUE),
					'email'		=> $this->input->post('email',TRUE),
					'pesan'		=> $this->input->post('pesan',TRUE)
				);

				$this->Hubungi_model->Tambah_data($data);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Pesan Berhasil DiKirim</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('home/index');
			}		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama','Nama','required',[
			'required'	=> 'Nama Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('email','Email','required',[
			'required'	=> 'Email Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('pesan','Pesan','required',[
			'required'	=> 'Pesan Tidak Boleh Kosong!'
		]);
	}
	
}
?>