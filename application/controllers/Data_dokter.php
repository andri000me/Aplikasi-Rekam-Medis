<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_dokter extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		 if(!$this->session->userdata('username')){
		 	redirect(base_url("auth"));
		}
		$this->load->model('Dokter_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Data Dokter';
		$data['dokter1'] = $this->Dokter_model->getAllDokter()->result();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_dokter/index', $data);
		$this->load->view('templates/home_footer');
	}
	public function tambah()
	{

		$judul['judul'] = 'Halaman Tambah Data Dokter';
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('username', 'Username' , 'required|trim|is_unique[dokter.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'password tidak sama !', 'min_length' => 'password terlalu pendek !'
				]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

				

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_dokter/input');
		$this->load->view('templates/home_footer');
		} else{
		$this->Dokter_model->tambah_data();
		redirect('data_dokter/index');
		}
		

	
	}

	public function hapus($id_dokter)
	{
		$this->Dokter_model->hapus_data($id_dokter);
		redirect('data_dokter/index');
	}


	public function ubah($id_dokter)
	{

		$judul['judul'] = 'Halaman Ubah Data Pengguna';
		$where1 = array('id_dokter' => $id_dokter);
		$data1['dokter'] = $this->Dokter_model->edit_data($where1,'dokter')->result();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_dokter/ubah', $data1);
		$this->load->view('templates/home_footer');

	}
	function update(){
		$id_dokter = $this->input->post('id_dokter');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$aktif = $this->input->post('aktif');
		$data = array(
			'nama' => $nama, 
			'username' => $username,
			'aktif' => $aktif
		);
		$where = array('id_dokter' => $id_dokter);

		$this->Dokter_model->update_data($where, $data,'dokter');
		redirect('data_dokter');
	}



}