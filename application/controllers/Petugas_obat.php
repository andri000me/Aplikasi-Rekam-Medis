<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_obat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}

		$this->load->model('Racik_model');
		$this->load->model('Obat_model');
		
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Beranda Petugas obat';
		$data['jumlahracik'] = $this->Racik_model->jumlahracik();
		$data['jumlahobat'] = $this->Obat_model->jumlahobat();
		$data['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('apoteker/index', $data);
		$this->load->view('templates/home_footer',$data);
	}

}