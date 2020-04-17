<?php  
/**
 * 
 */
class Mahasiswa_model extends CI_Model
{
	public function Tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function Ambil_data_mahasiswa($id)
	{
		$result		= $this->db->where('id',$id)->get('mahasiswa');

			if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return FALSE;
			}
			
	}

	public function Insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}
}
?>