<?php  
/**
 * 
 */
class Jurusan extends CI_Controller
{
	public function index()
	{

		$datajudul['judul'] 		= 'Jurusan';
		$data['jurusan'] 	= $this->Jurusan_model->Tampil_data()->result();

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/jurusan',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input()
	{
		$data = array(
			'id_jurusan'		=> set_value('id_jurusan'),
			'kode_jurusan'		=> set_value('kode_jurusan'),
			'nama_jurusan'		=> set_value('nama_jurusan'),
		);

		$datajudul['judul'] 		= 'Input Jurusan';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_jurusan',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->input();
		}else{
			$data = array(
				'kode_jurusan'		=> $this->input->post('kode_jurusan',TRUE),
				'nama_jurusan'		=> $this->input->post('nama_jurusan',TRUE),
			);

			$this->Jurusan_model->Input_data($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Jurusan Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/jurusan');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_jurusan','Kode Jurusan','required',[
			'required' => 'Kode Jurusan Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('nama_jurusan','Nama Jurusan','required',[
			'required' => 'Nama Jurusan Tidak Boleh Kosong'
		]);
	}

	public function edit($id)
	{
		$where = array('id_jurusan' => $id);

		$data['jurusan'] 			= $this->Jurusan_model->Edit_data($where,'jurusan')->result();

		$datajudul['judul'] 	= 'Edit Jurusan';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_jurusan',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function edit_aksi()
	{
		$id = $this->input->post('id_jurusan');
		$kode_jurusan = $this->input->post('kode_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');

		$data = array(
			'kode_jurusan'	=> $kode_jurusan,
			'nama_jurusan' 	=> $nama_jurusan
		);

		$where = array(
			'id_jurusan' => $id
		);

		$this->Jurusan_model->Update_data($where,$data,'jurusan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Jurusan Berhasil Diedit</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 		redirect('admin/jurusan');
	}

	public function hapus($id)
	{
		$where = array(
			'id_jurusan' => $id
		);

		$this->Jurusan_model->Hapus_data($where,'jurusan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		              <strong>Data Jurusan Berhasil Dihapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 		redirect('admin/jurusan');
	}
}
?>