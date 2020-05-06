<?php  
/**
 * 
 */
class Identitas_model extends CI_Model
{
	public $table 		= 'identitas';
	public $id 			= 'id_identitas';

		public function Tampil_data()
		{
			return $this->db->get($this->table);
		}

		public function Ambil_data($id)
		{
			return $this->db->get_where($this->table,array($this->id,$id));
		}

		public function Update_data($data, $where)
		{
			$this->db->where($where);
			$this->db->update($this->table,$data);
		}
}
?>