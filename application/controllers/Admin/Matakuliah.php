<?php  
/**
 * 
 */
class Matakuliah extends CI_Controller
{
	
	public function index()
	{
		$datajudul['judul']		= 'Matakuliah';

		$data['matakuliah']		= $this->Matakuliah_model->Tampil_data('matakuliah')->result();

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/matakuliah',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function input()
	{
		$data['prodi']		= $this->Matakuliah_model->Tampil_data('prodi')->result();
		$datajudul['judul']		= 'Tambah Matakuliah';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_matakuliah',$data);
 			$this->load->view('includesAdmin/footer');	
	}

	public function input_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->input();
			} else {
				$kode_matakuliah		= $this->input->post('kode_matakuliah',TRUE);
				$nama_matakuliah		= $this->input->post('nama_matakuliah',TRUE);
				$sks					= $this->input->post('sks',TRUE);
				$semester				= $this->input->post('semester',TRUE);
				$nama_prodi				= $this->input->post('nama_prodi',TRUE);

					$data = array(
						'kode_matakuliah'	=> $kode_matakuliah,
						'nama_matakuliah'	=> $nama_matakuliah,
						'sks'				=> $sks,
						'semester'			=> $semester,
						'nama_prodi'		=> $nama_prodi
					);

				$this->Matakuliah_model->Insert_data($data,'matakuliah');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Matakuliah Berhasil Ditambahkan</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/matakuliah');
			}		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_matakuliah','Kode mata kuliah','required',[
			'required'=>'Kode Mata Kuliah Wajib Diisi!'
		]);
		$this->form_validation->set_rules('nama_matakuliah','Nama mata kuliah','required',[
			'required'=>'Nama Mata Kuliah Wajib Diisi!'
		]);
		$this->form_validation->set_rules('sks','sks','required',[
			'required'=>'SKS Wajib Diisi!'
		]);
		$this->form_validation->set_rules('semester','semester','required',[
			'required'=>'Semester Wajib Diisi!'
		]);
		$this->form_validation->set_rules('nama_prodi','Nama prodi','required',[
			'required'=>'Nama Prodi Wajib Diisi!'
		]);
	}

	public function details($kode)
	{
		$data['details']		= $this->Matakuliah_model->Ambil_kode_matakuliah($kode);
		$datajudul['judul']		= 'Details Matakuliah';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/details_matakuliah',$data);
 			$this->load->view('includesAdmin/footer');	
	}

	public function edit($kode)
	{
		$where					= array('kode_matakuliah'=>$kode);
		$data['matakuliah']		= $this->db->query("SELECT * FROM matakuliah mk, prodi prd WHERE mk.nama_prodi=prd.nama_prodi AND mk.kode_matakuliah='$kode'")->result();
		$data['prodi']			= $this->Matakuliah_model->Tampil_data('prodi')->result();
		$datajudul['judul']		= 'Update Matakuliah';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/edit_matakuliah',$data);
 			$this->load->view('includesAdmin/footer');	
	}

	public function edit_aksi()
	{
		$id 					= $this->input->post('kode_matakuliah',TRUE);
		$kode_matakuliah		= $this->input->post('kode_matakuliah',TRUE);
		$nama_matakuliah 		= $this->input->post('nama_matakuliah',TRUE);
		$sks 					= $this->input->post('sks',TRUE);
		$semester 				= $this->input->post('semester',TRUE);
		$nama_prodi 			= $this->input->post('nama_prodi',TRUE);

			$where 		= array('kode_matakuliah' => $id);

			$data 		= array(
				'kode_matakuliah'	=> $kode_matakuliah,
				'nama_matakuliah'	=> $nama_matakuliah,
				'sks'				=> $sks,
				'semester'			=> $semester,
				'nama_prodi'		=> $nama_prodi
				);

			$this->Matakuliah_model->Update_data($where,$data,'matakuliah');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Matakuliah Berhasil DiUpdate</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/matakuliah');
	}

	public function hapus($kode)
	{
		$where = array('kode_matakuliah' => $kode);
		$this->Matakuliah_model->Hapus_data($where,'matakuliah');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data Matakuliah Berhasil DiHapus</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/matakuliah');
	}
}
?>