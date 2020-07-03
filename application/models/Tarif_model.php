<?php 

class Tarif_model extends CI_Model {

	public function getAllTarif()
	{
		return $this->db->get('tarif');

	}
	function tambah_data() 
	{
		$data = [	
		'nama_tarif' => $this->input->post('nama_tarif'),
		'harga' => $this->input->post('harga'),
		];
		
		$this->db->insert('tarif', $data);
	}

	public function hapus_data($id_tarif)
	{
		$this->db->where('id_tarif', $id_tarif);
		$this->db->delete('tarif');		
	}

	public function hapus($id_tarif)
	{
		$this->db->where('id_tarif', $id_tarif);
		$this->db->delete('tarif');		
	}

	public function getTarifById($id_tarif)
	{
		return $this->db->get_where('tarif', ['id_tarif' => $id_tarif ])->row_array();
	}

	public function ubah_data($id_tarif) 
	{
		$data = [	
		'nama_tarif' => $this->input->post('nama_tarif'),
		'harga' => $this->input->post('harga'),
		];
		

		$this->db->where('id_tarif', $this->input->post('id_tarif') );
		$this->db->update('tarif', $data);
	}
	function edit_data($where1, $table)
	{
		return $this->db->get_where($table,$where1);
	}
	function update_data($where,$data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	
	




}