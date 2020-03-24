<?php  
/**
 * 
 */
class Jurusan_model extends CI_Model
{
	public function Tampil_data()
	{
		return $this->db->get('jurusan');
	}

	public function Input_data($data)
	{
		$this->db->insert('jurusan',$data);
	}
}
?>