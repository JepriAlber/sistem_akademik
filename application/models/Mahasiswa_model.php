<?php  
/**
 * 
 */
class Mahasiswa_model extends CI_Model
{

	public $table 	= 'mahasiswa';
	public $npm 	= 'npm';


	public function Tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function Ambil_data_mahasiswa($id)
	{
		$result		= $this->db->where('id',$id)->get($this->table);

			if ($result->num_rows() > 0) {
				return $result->result();
			} else {
				return FALSE;
			}
			
	}

	public function Insert_data($data,$table)
	{
		$this->db->insert($table,$data);
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

	public function get_by_id($npm)
	{
		$this->db->where($this->npm,$npm);
		return $this->db->get($this->table)->row();
	}
}
?>