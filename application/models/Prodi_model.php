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

	public function Update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);	
	}

	public function Hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>