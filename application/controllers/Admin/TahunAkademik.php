<?php  
/**
 * 
 */
class TahunAkademik extends CI_Controller
{
	
	public function index()
	{
		$datajudul['judul'] 		= 'Tahun Akademik';
		$data['tahunakademik']	 	= $this->TahunAkademik_model->Tampil_data('tahun_akademik')->result();

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/tahun_akademik',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input()
	{
		$datajudul['judul']		= 'Tambah Tahun Akademik';
		$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_tahun_akademik');
 			$this->load->view('includesAdmin/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->input();
			} else {
				$tahunakademik 		= $this->input->post('tahun_akademik',TRUE);
				$semester	 		= $this->input->post('semester',TRUE);
				$status				= $this->input->post('status',TRUE);

					$data 	= array(
						'tahun_akademik'		=> $tahunakademik,
						'semester'				=> $semester,
						'status'				=> $status
					);

				$this->TahunAkademik_model->Insert_data($data,'tahun_akademik');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Tahun Akademik Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/tahunakademik');
			}
			
	}

	public function edit($id)
	{
		$where 	= array('id_ta' => $id);
		
		$data['tahunakademik'] 	= $this->TahunAkademik_model->Show($id);
		$datajudul['judul']		= 'Update Tahun Akademik';
			
			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_tahun_akademik',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function edit_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->edit($this->input->post('id_ta',TRUE));
			} else {
				$id 				= $this->input->post('id_ta',TRUE);
				$tahunakademik  	= $this->input->post('tahun_akademik',TRUE);
				$semester 			= $this->input->post('semester',TRUE);
				$status 			= $this->input->post('status',TRUE);

					$where 	= array(
						'id_ta' => $id
					);

					$data 	= array(
						'tahun_akademik' 	=>$tahunakademik,
						'semester'			=>$semester,
						'status'			=>$status
					);

				$this->TahunAkademik_model->Update_data($where,$data,'tahun_akademik');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Tahun Akademik Berhasil DiUpdate</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/tahunakademik');
			}
			
	}

	public function hapus($id)
	{
		$where 	= array('id_ta' => $id);
		$this->TahunAkademik_model->Hapus_data($where,'tahun_akademik');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Tahun Akademik Berhasil DiHapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/tahunakademik');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tahun_akademik','Tahun Akademik','required',[
			'required'	=> 'Tahun Akademik Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('semester','Semester','required',[
			'required'	=> 'Semester Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('status','Status','required',[
			'required'	=> 'Status Tidak Boleh Kosong!'
		]);
	}

}
?>