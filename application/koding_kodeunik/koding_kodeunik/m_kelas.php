<?php
/**
* 
*/
class m_kelas extends CI_Model
{
	
	
	
	function ambil_data_kelas()
	{
		return $this->db->get('kelas');
	}
	function tampil_data_kelas()
	{
		return $this->db->get('kelas');
	}
	function input_data_kelas($data, $table)
	{
		$this->db->insert($table,$data);
	}
	function edit_data_kelas($where, $table)
	{
		return $this->db->get_where($table,$where);
	}
	function update_data_kelas($where,$data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function hapus_data_kelas($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>