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

}
?>