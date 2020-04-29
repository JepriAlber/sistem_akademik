<?php 
/**
 * 
 */
class Nilai extends CI_Controller
{
	public function index()
	{
		$data 	= array(
			'npm'		=> set_value('nim'),
			'id_ta'		=> set_value('id_ta')
		);

		$datajudul['judul']		= 'Masuk Ke Hahalam KHS';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/masuk_khs',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function nilai_aksi()
	{

		$this->_rulesKhs();

			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$npm 			= $this->input->post('npm', TRUE);
				$thn_akad		= $this->input->post('id_ta', TRUE);

					$query 		= "SELECT krs.id_ta,krs.kode_matakuliah,matakuliah.nama_matakuliah,matakuliah.sks,krs.nilai
								   FROM krs INNER JOIN matakuliah ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
								   WHERE krs.npm = $npm AND krs.id_ta = $thn_akad";
				$sql			= $this->db->query($query)->result();

				$smt			= $this->db->select('tahun_akademik,semester')
											->from('tahun_akademik')
											->where(array('id_ta'=>$thn_akad))->get()->row();

					$quey_str	= "SELECT mahasiswa.npm, mahasiswa.nama_lengkap, prodi.nama_prodi
							       FROM mahasiswa INNER JOIN prodi ON (mahasiswa.nama_prodi = prodi.nama_prodi)";
				$mhs 			= $this->db->query($quey_str)->row();

				if ($smt->semester == 1) {
					$tampilSemester = 'Ganjil';
				} else {
					$tampilSemester = 'Genap';
				}
				
					$data      = array(
							'mhs_data'			=> $sql,
							'mhs_npm'			=> $npm,
							'mhs_nama'			=> $mhs->nama_lengkap,
							'mhs_prodi'			=> $mhs->nama_prodi,
							'tahun_akademik'	=> $smt->tahun_akademik."(".$tampilSemester.")", 		
					);

			$datajudul['judul']		= 'Kartu Hasil Studi';

					$this->load->view('includesAdmin/header',$datajudul);
		 			$this->load->view('includesAdmin/navbar');
		 			$this->load->view('includesAdmin/sidebar');
		 			$this->load->view('admin/khs',$data);
		 			$this->load->view('includesAdmin/footer');
			}

	}

	public function _rulesKhs()
	{
		$this->form_validation->set_rules('npm','NPM','required',[
			'required'	=> 'NPM Mahasiswa Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('id_ta','Tahun Akademik','required');
	}


	public function input_nilai()
	{
		$data 	= array(
			'kode_matakuliah' 	=> set_value('kode_matakuliah'),
			'id_ta'				=> set_value('id_ta')
		);

		$datajudul['judul']		= 'Masuk Ke Halaman Input Nilai';

					$this->load->view('includesAdmin/header',$datajudul);
		 			$this->load->view('includesAdmin/navbar');
		 			$this->load->view('includesAdmin/sidebar');
		 			$this->load->view('admin/masuk_nilai',$data);
		 			$this->load->view('includesAdmin/footer');
	}

	public function input_nilai_aksi()
	{
		$this->_rulesInputnilai();

			if ($this->form_validation->run() == FALSE) {
				$this->input_nilai();
			} else {
				$kode_matakuliah 		= $this->input->post('kode_matakuliah',TRUE);
				$id_ta 					= $this->input->post('id_ta',TRUE);

					$this->db->select('k.id_krs,k.npm,m.nama_lengkap,k.nilai,d.nama_matakuliah');
					$this->db->from('krs as k');
					$this->db->join('mahasiswa as m', 'm.npm = k.npm');
					$this->db->join('matakuliah as d','d.kode_matakuliah = k.kode_matakuliah');
					$this->db->where('k.id_ta',$id_ta);
					$this->db->where('k.kode_matakuliah',$kode_matakuliah);

				$query 					= $this->db->get()->result();

				$data 					= array(
					'list_nilai'		=> $query,
					'kode_matakuliah'	=> $kode_matakuliah,
					'id_ta'				=> $id_ta
				);

				$datajudul['judul']		= 'Halaman Input Nilai';

					$this->load->view('includesAdmin/header',$datajudul);
		 			$this->load->view('includesAdmin/navbar');
		 			$this->load->view('includesAdmin/sidebar');
		 			$this->load->view('admin/form_nilai',$data);
		 			$this->load->view('includesAdmin/footer');

			}	
	}

	public function _rulesInputnilai()
	{
		$this->form_validation->set_rules('kode_matakuliah','Kode Matakuliah','required',[
			'required' => 'Kode Matakuliah Tidak Boleh Kosong!'
		]);

		$this->form_validation->set_rules('id_ta','Tahun Akademik','required',[
			'required' => 'Tahun Akademik Tidak Boleh Kosong!'
		]);
	}

	public function simpan_nilai()
	{
		$query 		= array();
		$id_krs 	= $this->input->post('id_krs',TRUE);
		$nilai 		= $this->input->post('nilai',TRUE);

		// $id_krs = $_POST['id_krs'];
		// $nilai  = $_POST['nilai'];

			for ($i=0;$i < sizeof($id_krs); $i++) { 
				$query = $this->db->set('nilai', $nilai[$i])->where('id_krs',$id_krs[$i])->update('krs');
			}
	
		$data 		= array(
		  'id_krs'  => $id_krs	
		);

		$datajudul['judul']		= 'Daftar Nilai';

					$this->load->view('includesAdmin/header',$datajudul);
		 			$this->load->view('includesAdmin/navbar');
		 			$this->load->view('includesAdmin/sidebar');
		 			$this->load->view('admin/daftar_nilai',$data);
		 			$this->load->view('includesAdmin/footer');
	}

}

?>