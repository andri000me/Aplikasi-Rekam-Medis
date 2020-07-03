<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		 if(!$this->session->userdata('username')){
		 	redirect(base_url("auth"));
		}
		$this->load->model('Tarif_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Data Tarif';
		$data['tarif'] = $this->Tarif_model->getAllTarif()->result();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('tarif/index', $data);
		$this->load->view('templates/home_footer');
	}
	public function tambah()
	{

		$judul['judul'] = 'Halaman Data Tarif';
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama_tarif', 'Nama Tarif', 'required');
		$this->form_validation->set_rules('harga', 'Harga' , 'required');				

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('tarif/input');
		$this->load->view('templates/home_footer');
		} else{
		$this->Tarif_model->tambah_data();
		redirect('tarif/index');
		}
		

	
	}

	public function hapus($id_tarif)
	{
		$this->Tarif_model->hapus_data($id_tarif);
		redirect('tarif/index');
	}


	public function ubah($id_tarif)
	{

		$judul['judul'] = 'Halaman Ubah Data Tarif';
		$where1 = array('id_tarif' => $id_tarif);
		$data1['tarif'] = $this->Tarif_model->edit_data($where1,'tarif')->result();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('tarif/ubah', $data1);
		$this->load->view('templates/home_footer');

	}
	function update(){
		$id_tarif = $this->input->post('id_tarif');
		$nama_tarif = $this->input->post('nama_tarif');
		$harga = $this->input->post('harga');
		$data = array(
			'nama_tarif' => $nama_tarif,
			'harga' => $harga
		);
		$where = array('id_tarif' => $id_tarif);

		$this->Tarif_model->update_data($where, $data,'tarif');
		redirect('tarif');
	}



}