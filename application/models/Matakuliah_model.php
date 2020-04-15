<?php  
/**
 * 
 */
class Matakuliah_model extends CI_model{

	public function Tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function Insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}
}
?>