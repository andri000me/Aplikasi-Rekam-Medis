<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_obat extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}

		$this->load->model('Obat_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$judul['judul'] = 'Halaman Data Obat';
		$data['obat'] = $this->Obat_model->getAllObat()->result();
		$data['petugas_obat'] = $this->db->get_where('petugas_obat',['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar_apoteker', $data);
		$this->load->view('data_obat/index', $data);
		$this->load->view('templates/home_footer');
	}
	public function tambah()
	{

		$judul['judul'] = 'Halaman Tambah Data Obat';
		$data['petugas_obat'] = $this->db->get_where('petugas_obat',['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
				

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar_apoteker', $data);
		$this->load->view('data_obat/input', $data);
		$this->load->view('templates/home_footer');
		} else{
		$this->Obat_model->tambah_data();
		redirect('data_obat/index');
		}
		

	
	}

	public function hapus($id_obat)
	{
		$this->Obat_model->hapus_data($id_obat);
		redirect('data_obat/index');
	}

	public function detail($id_obat)
	{
		$judul['judul'] = 'Halaman Data Obat';
		$data['obat'] = $this->Obat_model->getObatById($id_obat);
		$data['petugas_obat'] = $this->db->get_where('petugas_obat',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar' );
		$this->load->view('templates/topbar_apoteker', $data);
		$this->load->view('data_obat/detail', $data);
		$this->load->view('templates/home_footer');
	}

	public function ubah($id_obat)
	{

		$judul['judul'] = 'Halaman Ubah Data Obat';
		$data['obat'] = $this->Obat_model->getObatById($id_obat);
		$data['petugas_obat'] = $this->db->get_where('petugas_obat',['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		
		

		if ( $this->form_validation->run() == FALSE) {
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/topbar_apoteker', $data);
		$this->load->view('data_obat/ubah', $data);
		$this->load->view('templates/home_footer');
		} else{
		$this->Obat_model->ubah_data();
		redirect('data_obat/index');
		}
		}
	
/*LAPORAN TRANSAKSI*/

	function laporan(){

		
			$ket = 'Semua Data Obat';            
			$url_cetak = 'data_obat/cetak';            
		 	$data['ket'] = $ket;    
		 	$data['url_cetak'] = base_url($url_cetak);           
		 	$data['obat'] = $this->Obat_model->getAllObat()->result();    
		 	$data['judul'] = 'Laporan Data Obat';
			$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
							
			$this->load->view('templates/home_header', $data);
			$this->load->view('templates/home_sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('data_obat/laporan', $data);
			$this->load->view('templates/home_footer');
		
	}     

	public function cetak(){    
                             
		$ket = 'Semua Data Obat';
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 Tanjungjaya';

	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['obat'] = $this->Obat_model->getAllObat()->result(); 
	  	$data['ket'] = $ket; 
	  	$data['alamat'] = $alamat; 
	  	$this->load->view('data_obat/preview', $data);    
	  	
	}


}