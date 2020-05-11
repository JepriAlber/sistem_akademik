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

}
?>