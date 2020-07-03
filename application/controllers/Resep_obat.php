<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep_obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}
		$this->load->model('Pasien_model');
		$this->load->model('Pemeriksaan_model');
		$this->load->model('Resep_model');
		$this->load->model('Obat_model');
		$this->load->model('m_id');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$judul['judul'] = 'Halaman Resep Obat';
		$data['koderesep'] = $this->m_id->buat_kode_resep();
		$data['pemeriksaan'] = $this->Pemeriksaan_model->view_all1();		
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('resep_obat/index', $data);
		$this->load->view('templates/home_footer' );
	}


	public function lihat($id_periksa){
		$judul['judul'] = 'Halaman Detail Resep';
		$where = array('id_periksa' => $id_periksa);
		$data['pemeriksaan'] = $this->Resep_model->tampil_detail($where)->result();
		$data['resep'] = $this->Resep_model->getResep($where)->result();
		$data['resep1'] = $this->Resep_model->getsub($where)->result();		
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar');
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('resep_obat/lihat', $data);
		$this->load->view('templates/home_footer' );
	}

	
	public function detail($id_periksa)
	{

		$judul['judul'] = 'Resep Obat';
		$data['desc'] = 'Informasi Pasien';
		$data['koderesep'] = $this->m_id->buat_kode_resep();
		$koderesep = $this->m_id->buat_kode_resep();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$where = array('id_periksa' => $id_periksa);
		$data['pemeriksaan'] = $this->Resep_model->tampil_detail($where)->result();
		$data['obat'] = $this->Obat_model->getAllObat()->result();
		$data['resep1'] = $this->Resep_model->tampil();
		$data['periksa'] = $this->Pemeriksaan_model->getPemeriksaan();
		$data['aturan'] = $this->db->query("SELECT nama_aturan FROM aturan_pakai ")->result();
		$data['resep'] = $this->db->query(" SELECT * FROM detail_resep JOIN obat on detail_resep.id_obat = obat.id_obat WHERE kd_resep='$koderesep'")->result();
		$data['subtotal'] = $this->Resep_model->hitungjumlah('detail_resep', ['kd_resep' => $this->m_id->buat_kode_resep()]);
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar',$data);
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('resep_obat/input', $data);
		$this->load->view('templates/home_footer');
		
		
}
	

	function tambah_aksi(){
		$username = $this->session->userdata('username');
		$kode_resep = $this->input->post('kd_resep');
		$kd_resep = $this->input->post('kd_resep');
		$id_obat = $this->input->post('id_obat');
		$aturan_pakai = implode(' , ', $this->input->post('aturan_pakai',TRUE)) ;
		$id_periksa = $this->input->post('id_periksa');
		$tanggal_resep = $this->input->post('tanggal_resep');
		$tambah = $this->input->post('tambah');
		$simpan = $this->input->post('simpan');
		$id_pemeriksaan = $this->input->post('id_pemeriksaan');
		$id_dokter = $this->db->query("SELECT id_dokter FROM dokter WHERE username='$username'")->row_array();

		$cek = $this->db->query("SELECT id_obat FROM detail_resep WHERE kd_resep='$kd_resep' AND id_obat='$id_obat'")->num_rows();
		$cek2 = $this->db->query("SELECT stok_out, stok_tot FROM detail_resep WHERE kd_resep='$kd_resep' AND id_obat='$id_obat'")->row_array();

		$stok = $this->input->post('stok');
		$stok_out = $this->input->post('stok_out');
		$stok_tot = floatval($stok) - floatval($stok_out);
		$stok_out2 = floatval($stok_out) + $cek2['stok_out'];
		$stok_tot2 = $cek2['stok_tot'] - floatval($stok_out);
		$harga = $this->input->post('harga');
		$total = floatval($stok_out) * floatval($harga);
		$total2 = floatval($stok_out2) * floatval($harga);
		$subtotal = $this->Resep_model->hitungjumlah('detail_resep', ['kd_resep' => $kd_resep]);


		if ($tambah) {
			if ($stok_tot < 0) {
				echo "<script language=\"javascript\">alert (\"Stok tidak cukup atau habis\"); document.location=\"../transaksi/tambah_keluar\"</script>";
		    }else{
				if ($cek > 0) {
				$this->db->query("UPDATE detail_resep set stok_out='$stok_out2', stok_tot='$stok_tot2', total='$total2' WHERE kd_resep='$kd_resep' AND id_obat='$id_obat'");
				redirect('resep_obat/detail/'.$id_periksa,'');
				}else{
				
			
			$data = array(
			'kd_resep' => $kd_resep,
			'id_obat' => $id_obat,
			'aturan_pakai' => $aturan_pakai,
			'stok_out'  => $stok_out,
			'stok_tot'  => $stok_tot,
			'total'  => $total
		); 
		
		$this->Resep_model->input_data1($data, 'detail_resep');
		redirect('resep_obat/detail/'.$id_periksa,'');
				}
			}
		}elseif ($simpan){
			$data = array(
			'kd_resep' => $kd_resep,
			'id_pemeriksaan' => $id_periksa,
			'subtotal' => $subtotal,
			'tanggal_resep' => $tanggal_resep,
			'id_dokter' => $id_dokter['id_dokter']
		); 
		
		$this->Resep_model->input_data($data, 'resep');
		$this->db->query("UPDATE obat JOIN detail_resep ON obat.id_obat = detail_resep.id_obat SET obat.stok = detail_resep.stok_tot WHERE detail_resep.kd_resep = '$kd_resep'");
		redirect('resep_obat/lihat/'.$id_periksa,'');
		}
	}




	
	public function hapus($kd_resep)
	{
		$this->Resep_model->hapus_data($kd_resep);
		redirect('resep_obat/index');
	}

	
	public function cek_obat()
	{
		$id_obat = $this->input->post('id_obat');
		$cek = $this->db->query("SELECT * FROM obat WHERE id_obat='$id_obat'")->row();
		$data = array(
			'stok' => $cek->stok,
			'harga' => $cek->harga,
			'id_obat' => $cek->id_obat
		);
		echo json_encode($data);
	}

	

	function hapus_detail_resep($koderesep)
	{
		$where = array('kd_resep' => $koderesep);
		$this->Resep_model->hapus($where, 'detail_resep');
		redirect('resep_obat/index');
	}

	/*LAPORAN TRANSAKSI*/

	function laporan(){

		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 

			$filter = $_GET['filter'];     

			if($filter == '1'){               
				$tanggal1 = $_GET['tanggal'];  
				$tanggal2 = $_GET['tanggal2'];                               
				$ket = 'Data Resep Obat dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' - '.date('d-m-y', strtotime($tanggal2));                
				$url_cetak = 'resep_obat/cetak1?tanggal1='.$tanggal1.'&tanggal2='.$tanggal2.'';           
				$resep_obat = $this->Resep_model->view_by_date($tanggal1,$tanggal2);             
			}

			else if($filter == '2'){                
			$kd_rm = $_GET['kd_rm'];                                              
			$ket = 'Data Resep Obat ';                
			$url_cetak = 'resep_obat/cetak2?&kd_rm='.$kd_rm;                
			$resep_obat = $this->Resep_model->view_by_kd_rm($kd_rm);             
			}		   

		}

		else{ 

			$ket = 'Semua Data Resep Obat';            
			$url_cetak = 'resep_obat/cetak';            
			$resep_obat = $this->Resep_model->view_all(); 

		}

		 	$data['ket'] = $ket;    
		 	$data['url_cetak'] = base_url($url_cetak);    
		 	$data['resep_obat'] = $resep_obat;       
		 	$data['kd_rm'] = $this->Pemeriksaan_model->kd_rm();
			    


		 	$data['judul'] = 'Laporan Data Resep Obat';
			$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
							
			$this->load->view('templates/home_header', $data);
			$this->load->view('templates/home_sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('resep_obat/laporan', $data);
			$this->load->view('templates/home_footer');
		
	}     

	public function cetak(){    
                             
		$ket = 'Semua Data Resep Obat';
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 Tanjungjaya';

	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['resep_obat'] = $this->Resep_model->view_all(); 
	  	$data['ket'] = $ket;  
	  	$data['alamat'] = $alamat;
	  	$this->load->view('resep_obat/preview', $data);    
	  	
	}

	public function cetak1(){    

	  	$tanggal1 = $_GET['tanggal1'];  
		$tanggal2 = $_GET['tanggal2'];                               
		$ket = 'Data Resep Obat dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' s/d '.date('d-m-y', strtotime($tanggal2));
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 Tanjungjaya';

	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['resep_obat'] = $this->Resep_model->view_by_date($tanggal1,$tanggal2);  
	  	$data['ket'] = $ket;  
	  	$data['alamat'] = $alamat;
	  	$this->load->view('resep_obat/preview', $data);    
	  	
	}

	public function cetak2(){    

	  	$kd_rm = $_GET['kd_rm'];                                             
		$ket = 'Kode RM   '   .$kd_rm  ;
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 Tanjungjaya';                           
	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['resep_obat'] = $this->Resep_model->view_by_kd_rm($kd_rm); 
	  	$data['resep'] = $this->db->query("SELECT * FROM pasien  where kd_rm = '$kd_rm'")->result();
	  	$data['ket'] = $ket; 
	  	$data['alamat'] = $alamat;
	  	$this->load->view('resep_obat/preview1', $data);    
	  	
	}



}