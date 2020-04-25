<?php  
/**
 * 
 */
class TahunAkademik_model extends CI_Model
{
	
	public $table 	= 'tahun_akademik';
	public $id 		= 'id_ta';

	public function Tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function Insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function Show($id)
	{
		$result = $this->db->where($this->id, $id)->get($this->table);

			if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return FALSE;
			}
			
	}

	public function Update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function Hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

}
?>