<?php  
/**
 * 
 */
class Dosen_model extends CI_Model
{
	public $table	= 'dosen';

	public function Tampil_data($table)
	{
		return $this->db->get('dosen');
	}

	public function Insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function Ambil_data_dosen($id)
	{
		$result		= $this->db->where('id_dosen',$id)->get($this->table);

			if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return FALSE;
			}
			
	}

	public function Hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function Update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>