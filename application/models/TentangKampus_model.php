<?php  
/**
 * 
 */
class TentangKampus_model extends CI_Model
{
	public $table		= 'tentang_kampus';
	public $id			= 'id';

		public function Tampil_data()
		{
			return $this->db->get($this->table);
		}

		public function Ambil_data($id)
		{
			return $this->db->get_where($this->table,array($this->id,$id));
		}

		public function Update_data($data,$where)
		{
			$this->db->where($where);
			$this->db->update($this->table,$data);
		}

}
?>