<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_apoteker extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		 if(!$this->session->userdata('username')){
		 	redirect(base_url("auth"));
		 }
		$this->load->model('Dokter_model');
		$this->load->model('Apoteker_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Data Petugas Obat';
		$data['apotek'] = $this->db->query("SELECT * FROM petugas_obat ")->result();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_apoteker/index', $data);
		$this->load->view('templates/home_footer');
	}
	public function tambah()
	{

		$judul['judul'] = 'Halaman Tambah Data Petugas Obat';
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('username', 'Username' , 'required|trim|is_unique[petugas_obat.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'password tidak sama !', 'min_length' => 'password terlalu pendek !'
				]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

				

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_apoteker/input');
		$this->load->view('templates/home_footer');
		} else{
		$this->Apoteker_model->tambah_data();
		redirect('data_apoteker/index');
		}
		

	
	}

	public function hapus($id)
	{
		$this->Dokter_model->hapus($id);
		redirect('data_apoteker/index');
	}


	public function ubah($id)
	{

		$judul['judul'] = 'Halaman Ubah Data Pengguna';
		$where1 = array('id' => $id);
		$data1['petugas_obat'] = $this->Apoteker_model->edit_data($where1,'petugas_obat')->result();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_apoteker/ubah', $data1);
		$this->load->view('templates/home_footer');

	}
	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$aktif = $this->input->post('aktif');
		$data = array(
			'nama' => $nama, 
			'username' => $username,
			'aktif' => $aktif
		);
		$where = array('id' => $id);

		$this->Apoteker_model->update_data($where, $data,'petugas_obat');
		redirect('data_apoteker');
	}




}