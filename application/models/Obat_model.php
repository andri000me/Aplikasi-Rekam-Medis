<?php 

class Obat_model extends CI_Model {

	public function getAllObat()
	{
		return $this->db->query('SELECT *
		 FROM  `obat` ORDER BY nama_obat ASC');

	}
	function tambah_data() 
	{
		$data = [
		'nama_obat' => $this->input->post('nama_obat'),
		'stok' => 0,
		'harga' => $this->input->post('harga')
	];
		
		$this->db->insert('obat', $data);
	}

	public function hapus_data($id_obat)
	{
		$this->db->where('id_obat', $id_obat);
		$this->db->delete('obat');		
	}

	public function getObatById($id_obat)
	{
		return $this->db->get_where('obat', ['id_obat' => $id_obat ])->row_array();
	}

	public function ubah_data() 
	{
		$data = [
		'nama_obat' => $this->input->post('nama_obat'),
		'stok' => $this->input->post('stok'),
		'harga' => $this->input->post('harga')];

		$this->db->where('id_obat', $this->input->post('id_obat') );
		$this->db->update('obat', $data);
	}

	function getAllObatSortNama()
	{
		 $query = "SELECT `obat`.`id_obat` , `obat`.`nama_obat`
		 FROM  `obat` ORDER BY nama_obat ASC ";
		$obat = $this->db->query($query);
        return $obat;
	}

	function jumlahobat(){
		$query=$this->db->get('obat');
		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}





}