<?php  
/**
 * 
 */
class User_model extends CI_Model
{

	public $table 	= 'user';
	public $id 		= 'id';

	public function Ambil_data($id)
	{
		$this->db->where('username',$id);
		return $this->db->get('user')->row();
	}

	public function Tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function Input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function show($where)
	{
		return $this->db->get_where($this->table,$where);
	}

	public function update_data($where,$data)
	{
		$this->db->where($where);
		$this->db->update($this->table,$data);
	}

	public function Hapus_data($where)
	{
		$this->db->where($where);
		$this->db->delete($this->table);
	}
}
?>