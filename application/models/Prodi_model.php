<?php  
/**
 * 
 */
class Prodi_model extends CI_Model
{
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