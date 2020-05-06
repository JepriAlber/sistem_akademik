<?php  
/**
 * 
 */
class Home extends CI_Controller
{
	
	public function index()
	{
		$data['identitas']		= $this->Identitas_model->Tampil_data()->result();

			$this->load->view('home',$data);
	}

}
?>