<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_penyakit extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}

		$this->load->model('Penyakit_model');
		$this->load->model('m_id');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Data Penyakit';
		$data['penyakit'] = $this->Penyakit_model->getAllPenyakit()->result();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $judul);
		$this->load->view('templates/home_topbar', $judul);
		$this->load->view('data_penyakit/index', $data);
		$this->load->view('templates/home_footer');
	}
	public function tambah()
	{

		$judul['judul'] = 'Halaman Tambah Data Penyakit';
		$data['kode'] = $this->m_id->buat_kode_penyakit();

		$this->form_validation->set_rules('nama_penyakit', 'Nama penyakit', 'required');
				

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar');
		$this->load->view('data_penyakit/input', $data);
		$this->load->view('templates/home_footer');
		} else{
		$this->Penyakit_model->tambah_data();
		redirect('data_penyakit/index');
		}
		

	
	}

	public function hapus($id_penyakit)
	{
		$this->Penyakit_model->hapus_data($id_penyakit);
		redirect('data_penyakit/index');
	}

	
	public function ubah($id_penyakit)
	{

		$judul['judul'] = 'Halaman Ubah Data Penyakit';
		$data['penyakit'] = $this->Penyakit_model->getPenyakitById($id_penyakit);

		$this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
		
		

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar');
		$this->load->view('data_penyakit/ubah', $data);
		$this->load->view('templates/home_footer');
		} else{
		$this->Penyakit_model->ubah_data();
		redirect('data_penyakit/index');
		}
		}

			public function cariDataPenyakit()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('nama_penyakit', $keyword);
		return $this->db->get('penyakit')->result_array();
	}



}