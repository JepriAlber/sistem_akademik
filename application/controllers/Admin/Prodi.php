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

	public function Tambah_prodi()
	{
		$data['jurusan'] = $this->Prodi_model->Tampil_data('jurusan')->result();
		$datajudul['judul'] 		= 'Tambah Prodi';
			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_prodi',$data);
 			$this->load->view('includesAdmin/footer');
 	}

 	public function Tambah_prodi_aksi()
 	{
 		$this->_rules();
 			if ($this->form_validation->run()==FALSE) {
 				$this->Tambah_prodi();
 			} else {
 				$kode_prodi 	= $this->input->post('kode_prodi',TRUE);
 				$nama_prodi 	= $this->input->post('nama_prodi',TRUE);
 				$nama_jurusan 	= $this->input->post('nama_jurusan',TRUE);
 				
 					$data = array(
 						'kode_prodi' 	=> $kode_prodi,
 						'nama_prodi'	=> $nama_prodi,
 						'nama_jurusan'	=> $nama_jurusan
 					);

 				$this->Prodi_model->Insert_data($data,'prodi');
 				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Prodi Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/prodi');
 			}
 			
 	}

 	public function _rules()
	{
		$this->form_validation->set_rules('kode_prodi','Kode prodi','required',[
			'required' => 'Kode Prodi Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('nama_prodi','Nama prodi','required',[
			'required' => 'Nama Prodi Tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('nama_jurusan','Nama Jurusan','required',[
			'required' => 'Nama Jurusan Tidak Boleh Kosong'
		]);
	}

	public function update($id)
	{
		$where				= array('id_prodi' => $id);
		
		$data['prodi']		= $this->db->query("SELECT * FROM prodi prd, jurusan jrs WHERE prd.nama_jurusan = jrs.nama_jurusan AND prd.id_prodi='$id'")->result();
		$data['jurusan'] 	= $this->Prodi_model->Tampil_data('jurusan')->result(); 
		
		$datajudul['judul'] 		= 'Update Prodi';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_prodi',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function update_aksi()
	{
		$id 			= $this->input->post('id_prodi',true);
		$kode_prodi 	= $this->input->post('kode_prodi',true);
		$nama_prodi 	= $this->input->post('nama_prodi',true);
		$nama_jurusan 	= $this->input->post('nama_jurusan',true);

			$data 		= array(
				'kode_prodi'	=> $kode_prodi,
				'nama_prodi'	=> $nama_prodi,
				'nama_jurusan'	=> $nama_jurusan
			);	

			$where 		= array('id_prodi'=> $id);

		$this->Prodi_model->Update_data($where,$data,'prodi');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Prodi Berhasil DiUpdate</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/prodi');
	}

	public function hapus($id)
	{
		$where 		= array('id_prodi' => $id);
		$this->Prodi_model->Hapus_data($where,'prodi');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Prodi Berhasil DiUpdate</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/prodi');
	}
}
?>