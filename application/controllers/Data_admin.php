<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_admin extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		 if(!$this->session->userdata('username')){
		 	redirect(base_url("auth"));
		}
		$this->load->model('Admin_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Data Admin';
		$data['admin1'] = $this->Admin_model->getAllAdmin()->result();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_admin/index', $data);
		$this->load->view('templates/home_footer');
	}
	public function tambah()
	{

		$judul['judul'] = 'Halaman Tambah Data Admin';
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('username', 'Username' , 'required|trim|is_unique[admin.username]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'password tidak sama !', 'min_length' => 'password terlalu pendek !'
				]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

				

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_admin/input');
		$this->load->view('templates/home_footer');
		} else{
		$this->Admin_model->tambah_data();
		redirect('data_admin/index');
		}
		

	
	}

	public function hapus($id_admin)
	{
		$this->Admin_model->hapus_data($id_admin);
		redirect('data_admin/index');
	}


	public function ubah($id_admin)
	{

		$judul['judul'] = 'Halaman Ubah Data Pengguna';
		$where1 = array('id_admin' => $id_admin);
		$data1['admin'] = $this->Admin_model->edit_data($where1,'admin')->result();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('data_admin/ubah', $data1);
		$this->load->view('templates/home_footer');

	}
	function update(){
		$id_admin = $this->input->post('id_admin');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$aktif = $this->input->post('aktif');
		$data = array(
			'nama' => $nama, 
			'username' => $username,
			'aktif' => $aktif
		);
		$where = array('id_admin' => $id_admin);

		$this->Admin_model->update_data($where, $data,'admin');
		redirect('data_admin');
	}



}