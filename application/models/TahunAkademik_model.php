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

	public function Insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function Show($id)
	{
		$result = $this->db->where('id', $id)->get('tahun_akademik');

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

}
?>