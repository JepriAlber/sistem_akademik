<?php  
/**
 * 
 */
class Prodi extends CI_Controller
{
	
	public function index()
	{
		$data['prodi'] = $this->Prodi_model->Tampil_data('prodi')->result();
		$datajudul['judul'] 		= 'Prodi';
			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/prodi',$data);
 			$this->load->view('includesAdmin/footer');
	}
}
?>