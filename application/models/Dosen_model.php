<?php  
/**
 * 
 */
class Dosen_model extends CI_Model
{
	public function Tampil_data($table)
	{
		return $this->db->get('dosen');
	}
}
?>