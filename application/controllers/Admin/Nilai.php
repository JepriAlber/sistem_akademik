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
}

?>