<?php 

class Penyakit_model extends CI_Model {

	public function getAllPenyakit()
	{
		return $this->db->get('penyakit');

	}
	function tambah_data() 
	{
		$data = [
		'nama_penyakit' => $this->input->post('nama_penyakit'),
		'kd_penyakit' => $this->input->post('kd_penyakit')
	];
		
		$this->db->insert('penyakit', $data);
	}

	public function hapus_data($id_penyakit)
	{
		$this->db->where('id_penyakit', $id_penyakit);
		$this->db->delete('penyakit');		
	}

	public function getPenyakitByNama()
	{
		$query = "SELECT `penyakit`.`id_penyakit` , `penyakit`.`nama_penyakit`
		 FROM  `penyakit` ";
		$penyakit = $this->db->query($query)->result_array();
        return $penyakit;

	}

	public function getPenyakitById($id_penyakit)
	{
		return $this->db->get_where('penyakit', ['id_penyakit' => $id_penyakit ])->row_array();
	}

	public function ubah_data() 
	{
		$data = [
		'nama_penyakit' => $this->input->post('nama_penyakit'),
		'kd_penyakit' => $this->input->post('kd_penyakit')];

		$this->db->where('id_penyakit', $this->input->post('id_penyakit') );
		$this->db->update('penyakit', $data);
	}





}