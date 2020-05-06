<?php  
/**
 * 
 */
class Identitas extends CI_Controller
{
	
	public function index()
	{
		$data['identitas'] 		= $this->Identitas_model->Tampil_data()->result();
		$datajudul['judul']		= 'Identitas';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/identitas',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function update($id)
	{	

		$data['identitas']  	= $this->Identitas_model->Ambil_data($id)->result();
		$datajudul['judul']		= 'Update Identitas';
			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_identitas',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function update_identitas_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id_identitas',TRUE));
			} else {
				$id_identitas 		 	= $this->input->post('id_identitas', TRUE);
				$judul_website			= $this->input->post('judul_website', TRUE);
				$email					= $this->input->post('email',TRUE);
				$alamat					= $this->input->post('alamat',TRUE);
				$telp					= $this->input->post('telp',TRUE);

					$data 				= array(
						'judul_website'	=> $judul_website,
						'email'			=> $email,
						'alamat'		=> $alamat,
						'telp'			=> $telp
					);

					$where				= array(
						'id_identitas'	=> $id_identitas
					);

				$this->Identitas_model->Update_data($data,$where);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				              <strong>Data Identitas Berhasil Diupdate</strong>
				              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>');
		 				redirect('admin/identitas'); 

			}

	}

	public function _rules()
	{
		$this->form_validation->set_rules('judul_website','NAMA WEBSITE','required',[
			'required'	=> 'Nama WEBSITE Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('email','Email','required',[
			'required'	=> 'Email Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('alamat','Alamat','required',[
			'required'	=> 'Alamat Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('telp','No Telepon','required',[
			'required'	=> 'No Telepon Tidak Boleh Kosong!'
		]);
	}

}
?>