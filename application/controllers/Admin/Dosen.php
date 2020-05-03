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

}
?>