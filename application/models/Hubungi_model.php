<?php 
/**
 * 
 */
class Hubungi_model extends CI_Model
{
	
	public $table 		= 'hubungi';
	public $id			= 'id_hubungi';

		public function Tampil_data()
		{
			return $this->db->get($this->table);
		}

		public function Tambah_data($data)
		{
			$this->db->insert($this->table, $data);
		}

		public function Hapus_data($id)
		{
			$this->db->where(array($this->id => $id));
			$this->db->delete($this->table);
		}

}
?>