<?php 

class Karyawan_model extends CI_Model {

	public function getAllKaryawan()
	{
		return $this->db->get('karyawan');

	}
	function tambah_data() 
	{
		$data = [
		'nip' => $this->input->post('nip'),
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
		'jk' => $this->input->post('jk'),
		'jabatan' => $this->input->post('jabatan'),
		'alamat' => $this->input->post('alamat'),
		'role_id' => $this->input->post('role_id'),

	];
		
		$this->db->insert('karyawan', $data);
	}

	public function hapus_data($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->delete('karyawan');		
	}

	public function getKaryawanById($nip)
	{
		return $this->db->get_where('karyawan', ['nip' => $nip ])->row_array();
	}

	

	public function ubah_data() 
	{
		$data = [
		'nip' => $this->input->post('nip'),
		'password' => $this->input->post('password'),
		'nama_karyawan' => $this->input->post('nama_karyawan'),
		'jk' => $this->input->post('jk'),
		'jabatan' => $this->input->post('jabatan'),
		'alamat' => $this->input->post('alamat')

	];
		$this->db->where('nip', $this->input->post('nip') );
		$this->db->update('karyawan', $data);
	}

	function jumlahkaryawan(){
		$query=$this->db->get('karyawan');
		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}





}