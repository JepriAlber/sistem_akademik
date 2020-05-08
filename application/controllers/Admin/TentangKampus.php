<?php  
/**
 * 
 */
class TentangKampus extends CI_Controller
{
	
	public function index()
	{
		$data['tentang']		= $this->TentangKampus_model->Tampil_data()->result();
		$datajudul['judul']		= 'Tentang Kampus';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/tentang_kampus',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function update($id)
	{
		$data['tentang'] 		= $this->TentangKampus_model->Ambil_data($id)->result();
		$datajudul['judul']		= 'Update Tentang Kampus';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_tentang_kampus',$data);
 			$this->load->view('includesAdmin/footer');

	}

	public function update_tentang_aksi()
	{
		$this->_rules();
			if ($this->form_validation->run() == FALSE) {
				 $this->update($this->input->post('id',TRUE));
			} else {
				$id 		= $this->input->post('id',TRUE);
				$sejarah	= $this->input->post('sejarah',TRUE);
				$visi		= $this->input->post('visi',TRUE);
				$misi		= $this->input->post('misi',TRUE);

					$data 	= array(
						'sejarah'		=> $sejarah,
						'visi'			=> $visi,
						'misi'			=> $misi
					);

					$where	= array(
						'id'			=> $id
					);

				$this->TentangKampus_model->Update_data($data,$where);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				              <strong>Data Tentang Kampus Berhasil Diupdate</strong>
				              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                <span aria-hidden="true">&times;</span>
				              </button>
				            </div>');
		 				redirect('admin/tentangkampus'); 
			}	
	}

	public function _rules()
	{
		$this->form_validation->set_rules('sejarah','Sejarah','required',[
			'required'	=> 'Sejarah Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('visi','Visi','required',[
			'required'	=> 'Visi Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('misi','MIsi','required',[
			'required'	=> 'MIsi Tidak Boleh Kosong!'
		]);
	}

}
?>