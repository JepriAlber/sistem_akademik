<?php  
/**
 * 
 */
class Krs extends CI_Controller
{
	
	public function index()
	{

		$data = array(
			'npm'		=> set_value('npm'),
			'id_ta'		=> set_value('id_ta'),
		);
		$datajudul['judul']		= 'Masuk Krs';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/masuk_krs',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function krs_aksi()
	{
		$this->_rulesKrs();

			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$npm 		= $this->input->post('npm',TRUE);
				$thn_akad	= $this->input->post('id_ta',TRUE);
			}

			if ($this->Mahasiswa_model->get_by_id($npm) == NULL ){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		              <strong>Data Mahasiswa Tidak Ada!</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/krs');
			}
			
		$data 		= array(
					'npm'				=> $npm,
					'id_ta'				=> $thn_akad,
					'nama_lengkap'		=> $this->Mahasiswa_model->get_by_id($npm)->nama_lengkap
		);

		$dataKrs	= array(
					'krs_data'			=> $this->baca_krs($npm,$thn_akad),
					'npm'				=> $npm,
					'id_ta'				=> $thn_akad,
					'tahun_akademik'	=> $this->TahunAkademik_model->get_by_id($thn_akad)->tahun_akademik,
					'semester'			=> $this->TahunAkademik_model->get_by_id($thn_akad)->semester==1?'Ganjil':'Genap',
					'nama_lengkap'		=> $this->Mahasiswa_model->get_by_id($npm)->nama_lengkap,
					'nama_prodi'		=> $this->Mahasiswa_model->get_by_id($npm)->nama_prodi
		);

		$datajudul['judul']		= 'List Krs';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/list_krs',$dataKrs);
 			$this->load->view('includesAdmin/footer');
	}

	public function baca_krs($npm, $thn_akad)
	{
		$this->db->select('k.id_krs,k.kode_matakuliah,m.nama_matakuliah,m.sks');
		$this->db->from('krs as k');
		$this->db->where('k.npm',$npm);
		$this->db->where('k.id_ta',$thn_akad);
		$this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');

		$krs  = $this->db->get()->result();

		return $krs;
	}

	public function _rulesKrs()
	{
		$this->form_validation->set_rules('npm','NPM','required',[
			'required' => 'NPM Tidak Boleh Kosong!'
		]);

		$this->form_validation->set_rules('id_ta','ID TAHUN AKADEMIK','required',[
			'required' => 'Tahun Akademik / Semester Tidak Boleh Kosong!'
		]);
	}

	public function tambah_krs($npm,$thn_akad)
	{
		$data 	= array(
			'id_krs'			=> set_value('id_krs'),
			'id_ta'				=> $thn_akad,
			'tahun_akademik'	=> $this->TahunAkademik_model->get_by_id($thn_akad)->tahun_akademik,
			'semester'			=> $this->TahunAkademik_model->get_by_id($thn_akad)->semester==1?'Ganjil':'Genap',
			'npm'				=> $npm,
			'kode_matakuliah'	=> set_value('kode_matakuliah')
		);

		$datajudul['judul']		= 'Tambah Data KRS';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/form_krs',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function tambah_krs_aksi()
	{
		$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->tambah_krs($this->input->post('npm',TRUE), $this->input->post('id_ta'));
			} else {
				$npm 				= $this->input->post('npm',TRUE);
				$id_ta				= $this->input->post('id_ta',TRUE);
				$kode_matakuliah	= $this->input->post('kode_matakuliah', TRUE);

					$data 	= array(
						'npm'				=> $npm,
						'id_ta'			=> $id_ta,
						'kode_matakuliah'	=> $kode_matakuliah
					);

				$this->Krs_model->Insert_data($data);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data KHS Berhasil Ditambah!</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/krs/index');
			}	
	}

	public function _rules()
	{
		$this->form_validation->set_rules('npm','NPM','required');
		
		$this->form_validation->set_rules('id_ta','id_ta','required');

		$this->form_validation->set_rules('kode_matakuliah','Kode Matakuliah','required',[
			'required' => 'Kode Matakuliah Tidak Boleh Kosong!'
		]);
	}

	public function update($id)
	{
		$row 	= $this->Krs_model->get_by_id($id);
		$th 	= $row->id_ta;

			if ($row) {
					
					$data 	= array(
							'id_krs'  			=> set_value('id_krs', $row->id_krs),
							'id_ta'  			=> set_value('id_ta', $row->id_ta),
							'npm'				=> set_value('npm', $row->npm),
							'kode_matakuliah'	=> set_value('kode_matakuliah', $row->kode_matakuliah),
							'tahun_akademik'	=> $this->TahunAkademik_model->get_by_id($th)->tahun_akademik,
							'semester'			=> $this->TahunAkademik_model->get_by_id($th)->semester==1?'Ganjil':'Genap'
						);

					$datajudul['judul']		= 'Tambah Data KRS';

						$this->load->view('includesAdmin/header',$datajudul);
			 			$this->load->view('includesAdmin/navbar');
			 			$this->load->view('includesAdmin/sidebar');
			 			$this->load->view('admin/edit_krs',$data);
			 			$this->load->view('includesAdmin/footer');

			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
		              <strong>Data Tidak Ditemukan!</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/krs/index');
			}	
	}

	public function update_krs_aksi()
	{
		$id_krs				= $this->input->post('id_krs',TRUE);
		$npm 				= $this->input->post('npm',TRUE);
		$id_ta 				= $this->input->post('id_ta',TRUE);
		$kode_matakuliah	= $this->input->post('kode_matakuliah',TRUE);

			$data   = array(
				'id_krs'			=> $id_krs,
				'id_ta'				=> $id_ta,
				'npm'				=> $npm,
				'kode_matakuliah'	=> $kode_matakuliah
			);
		$this->Krs_model->Update_data($id_krs,$data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data KRS Berhasil Diedit!</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/krs/index');
	}

	public function hapus($id)
	{
		$where 		=array('id_krs' => $id);
		$this->Krs_model->Hapus_data($where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Data KRS Berhasil DiHapus!</strong>
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>');
 				redirect('admin/krs/index');
	}

}
?>