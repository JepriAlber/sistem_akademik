<?php  
/**
 * 
 */
class Matakuliah_model extends CI_model{

	public $table 	= 'matakuliah';
	public $kode 	= 'kode_matakuliah';

	public function Tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function Insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function Ambil_kode_matakuliah($kode)
	{
		$result 	= $this->db->where('kode_matakuliah',$kode)->get('matakuliah');

		if ($result->num_rows() > 0 ) {
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

	public function get_by_id($kode)
	{
		$this->db->where($this->kode,$kode);
		return $this->db->get($this->table)->row();
	}
}
?>