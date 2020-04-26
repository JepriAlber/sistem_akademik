<?php  
/**
 * 
 */
class Krs_model extends CI_Model
{

	public $table   = 'krs';
	public $id 		= 'id_krs';

	public function Insert_data($data)
	{
		$this->db->insert($this->table,$data);
	}

	public function get_by_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}

	public function Update_data($id, $data)
	{
		$this->db->where($this->id,$id);
		$this->db->update($this->table,$data);
	}
	public function Hapus_data($where)
	{
		$this->db->where($where);
		$this->db->delete($this->table);
	}
}
?>