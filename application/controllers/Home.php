<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$judul['judul'] = 'Halaman Beranda Dokter';
		$data['jumlahpasien'] = $this->Pasien_model->jumlahpasien();
		$data['jumlahrm'] = $this->Pemeriksaan_model->jumlahrm();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('templates/home_footer',$data);
	}

}