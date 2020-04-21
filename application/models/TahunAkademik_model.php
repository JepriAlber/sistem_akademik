<?php  
/**
 * 
 */
class TahunAkademik_model extends CI_Model
{
	
	public function Tampil_data($table)
	{
		return $this->db->get($table);
	}

}
?>