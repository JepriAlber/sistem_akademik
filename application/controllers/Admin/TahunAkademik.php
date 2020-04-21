<?php  
/**
 * 
 */
class TahunAkademik extends CI_Controller
{
	
	public function index()
	{
		$datajudul['judul'] 		= 'Jurusan';
		$data['tahunakademik']	 	= $this->TahunAkademik_model->Tampil_data('tahun_akademik')->result();

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/tahun_akademik',$data);
 			$this->load->view('includesAdmin/footer');
	}

}
?>