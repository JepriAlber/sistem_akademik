<?php  
/**
 * 
 */
class Informasi_model extends CI_Model
{
	public $table 		= 'informasi';
	public $id 			= 'id_informasi';

		public function Tampil_data()
		{
			return $this->db->get($this->table);
		}

		public function Tambah_data($data)
		{
			$this->db->insert($this->table,$data);
		}

		public function Ambil_data($id)
		{
			return $this->db->get_where($this->table,array($this->id => $id));
		}

		public function Update_data($data,$where)
		{
			$this->db->where($where);
			$this->db->update($this->table,$data);
		}

		public function Hapus_data($id)
		{
			$this->db->where(array($this->id => $id));
			$this->db->delete($this->table);
		}
}
?>