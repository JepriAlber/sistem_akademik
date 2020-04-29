<?php  

	 function skorNilai($nilai,$sks)
	{
		if ($nilai == 'A') {
			$skor = 4*$sks;
		} else if ($nilai == 'B') {
			$skor = 3*$sks;
		} else if ($nilai == 'C') {
			$skor = 2*$sks;
		} else if ($nilai == 'D') {
			$skor = 1*$sks;
		} else {
			$skor = 0;
		}
		return $skor;
	}

	function cekNilai($npm,$kode,$nilaikhs)
	{
		$nilai 		= get_instance();
		$nilai->load->model('Transkrip_model');

		$nilai->db->select('*');
		$nilai->db->from('transkrip_nilai');
		$nilai->db->where('npm',$npm);
		$nilai->db->where('kode_matakuliah',$kode);
		$query = $nilai->db->get()->row();

			if ($query!=null) {
				
				if ($nilaikhs < $query->nilai) {
					$nilai->db->set('nilai',$nilaikhs)
						  	  ->where('npm',$npm)
						  	  ->where('kode_matakuliah',$kode)
						     ->update('transkrip_nilai');
				}

			}else {
				$data 	= array(
					'npm'				=> $npm,
					'nilai'				=> $nilaikhs,
					'kode_matakuliah'	=> $kode
				);

				$nilai->Transkrip_model->Insert_data($data);
			} 
			
	}

?>