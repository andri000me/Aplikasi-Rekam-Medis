<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}

		$this->load->model('Pasien_model');
		$this->load->model('Pemeriksaan_model');
		
		
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Beranda Petugas Obat';
		$data['jumlahpasien'] = $this->Pasien_model->jumlahpasien();
		$data['jumlahrm'] = $this->Pemeriksaan_model->jumlahrm();
		$data['petugas_obat'] = $this->db->get_where('petugas_obat',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar_apoteker', $data);
		$this->load->view('apoteker/index', $data);
		$this->load->view('templates/home_footer',$data);
	}

}