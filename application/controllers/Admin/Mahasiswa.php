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

}
?>