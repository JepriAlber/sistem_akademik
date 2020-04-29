<?php  
/**
 * 
 */
class Transkrip_nilai extends CI_Controller
{
	public function index()
	{
		$data 	= array(
			'npm'		=> set_value('npm')
		);

		$datajudul['judul']		= 'Masuk Ke Hahalam Cetak Transkrip Nilai';

			$this->load->view('includesAdmin/header',$datajudul);
 			$this->load->view('includesAdmin/navbar');
 			$this->load->view('includesAdmin/sidebar');
 			$this->load->view('admin/masuk_transkip_nilai',$data);
 			$this->load->view('includesAdmin/footer');
	}

	public function buat_transkrip_nilai_aksi()
	{
		$this->_rulesTranskripnilai();

			if ($this->form_validation->run() == FALSE) {
				$this->index();
			} else {
				$npm 		= $this->input->post('npm',TRUE);

				$krs 		= $this->db->select('*')
									   ->from('krs')
									   ->where('npm',$npm)
									   ->get();

					foreach ($krs->result() as $value) {
						cekNilai($value->npm, $value->kode_matakuliah, $value->nilai);
					}

				$transkrip 	= $this->db->select('t.kode_matakuliah,m.nama_matakuliah,m.sks,t.nilai')
									   ->from('transkrip_nilai as t')
									   ->where('npm',$npm)
									   ->join('matakuliah as m', 'm.kode_matakuliah=t.kode_matakuliah')
									   ->get()->result();

				$mhs 		= $this->db->select('nama_lengkap, nama_prodi')
									   ->from('mahasiswa')
									   ->where(array('npm'=>$npm))
									   ->get()->row();
				
				$prodi 		= $this->db->select('nama_prodi')
									   ->from('prodi')
									   ->where(array('nama_prodi'=>$mhs->nama_prodi))
									   ->get()->row()->nama_prodi;

				$data 		= array(

				'transkrip' => $transkrip,
				'npm'		=> $npm,
				'nama'		=> $mhs->nama_lengkap,
				'prodi'		=> $prodi	
				
				);

				$datajudul['judul']		= 'Masuk Ke Transkrip Nilai';

					$this->load->view('includesAdmin/header',$datajudul);
		 			$this->load->view('includesAdmin/navbar');
		 			$this->load->view('includesAdmin/sidebar');
		 			$this->load->view('admin/transkip_nilai',$data);
		 			$this->load->view('includesAdmin/footer');
			}
			
	}

	public function _rulesTranskripnilai()
	{
		$this->form_validation->set_rules('npm','NPM','required',[
			'required'	=> 'NPM Mahasiswa Tidak Boleh Kosong!'
		]);
	}
}
?>