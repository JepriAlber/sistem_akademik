<?php  
/**
 * 
 */
class Hubungi extends CI_Controller
{
	
	public function index()
	{
		$data['hubungi'] 			= $this->Hubungi_model->Tampil_data()->result();
		$datajudul['judul']			= 'Pesan User';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/hubungi',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function hapus($id)
	{
		$this->Hubungi_model->Hapus_data($id);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Pesan Berhasil DiHapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/hubungi');
	}

	public function balas_email($id)
	{
		$data['hubungi']			= $this->Hubungi_model->Ambil_data($id)->result();
		$datajudul['judul']			= 'Pesan User';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/balas_hubungi',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function balas_email_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->balas_email($this->input->post('id_hubungi',TRUE));
			} else {
				$to_email			= $this->input->post('email',TRUE);
				$subject			= $this->input->post('subject',TRUE);
				$pesan 				= $this->input->post('pesan',TRUE);

				$config = Array(
				  'protocol' 	=> 'smtp',
				  'smtp_host'	=> 'smtp.mailtrap.io',
				  'smtp_port' 	=> 2525,
				  'smtp_user'	=> 'ff4f3973f58580',
				  'smtp_pass' 	=> '8dda50855044df',
				  'crlf' 		=> "\r\n",
				  'newline' 	=> "\r\n"
				);

				$this->load->library('email', $config);
				$this->email->from('Universitas Kebahagian');
				$this->email->to($to_email);
				$this->email->subject($subject);
				$this->email->message($pesan);

					if ($this->email->send()) {
						$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					              <strong>Pesan Berhasil DiKirim</strong>
					              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
					              </button>
					            </div>');
		 				redirect('admin/hubungi');
					} else {


						$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					              <strong>Pesan Gagal DiKirim</strong>
					              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                <span aria-hidden="true">&times;</span>
					              </button>
					            </div>');
		 				redirect('admin/hubungi');
					}
					
			}
			
	}

	public function _rules()
	{
		$this->form_validation->set_rules('email','Email','required',[
			'required'		=> 'Email Wajib Diisi!'
		]);
		$this->form_validation->set_rules('subject','Subject','required',[
			'required'		=> 'Subject Wajib Diisi!'
		]);
		$this->form_validation->set_rules('pesan','Pesan','required',[
			'required'		=> 'Pesan Wajib Diisi!'
		]);
	}

}
?>