<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(base_url("auth"));
		}

		$this->load->model('Pasien_model');
		$this->load->model('Pemeriksaan_model');
		$this->load->model('Pembayaran_model');
		$this->load->model('Resep_model');
		$this->load->model('Obat_model');
		$this->load->model('m_id');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}


	public function index()
	{
		$judul['judul'] = 'Halaman Pembayaran';
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
		$data['kodebayar'] = $this->m_id->buat_kode_bayar();
		$data['bayar'] = $this->Pembayaran_model->getAllBayar();

		
	
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembayaran/index', $data);
		$this->load->view('templates/home_footer');
	}

		public function tambah($kd_resep)
	{

		$judul['judul'] = 'Halaman Tambah Data Pembayaran';
		$data['kodebayar'] = $this->m_id->buat_kode_bayar();
		$kodebayar = $this->m_id->buat_kode_bayar();
		$where = array('kd_resep' => $kd_resep);
		$data['kode'] = $this->Pembayaran_model->tampil_detail($where)->result();
		$data['tarif'] = $this->Pembayaran_model->tampil();
		$data['resep'] = $this->Resep_model->tampil();
		$data['pemeriksaan'] = $this->Pembayaran_model->getBayar($where);
		$data['bayar'] = $this->db->query("SELECT * FROM detail_bayar JOIN tarif on detail_bayar.id_tarif = tarif.id_tarif WHERE kd_bayar='$kodebayar'")->result();
		$subtotal = $this->Resep_model->hitungjumlahbayar('detail_bayar', ['kd_bayar' => $this->m_id->buat_kode_bayar()]);
		$data['subtotal'] = $this->Resep_model->hitungjumlahbayar('detail_bayar', ['kd_bayar' => $this->m_id->buat_kode_bayar()]); 
		$cek = $this->db->query("SELECT subtotal FROM resep WHERE kd_resep='$kd_resep'")->row_array();
		$data['totalbayar'] = floatval($subtotal) + $cek['subtotal'];
		 $data['data']=$this->Pembayaran_model->get_all_produk();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembayaran/input', $data);
		$this->load->view('templates/home_footer');
		
		}

		function tambah_aksi()
	{
		$username = $this->session->userdata('username');
		$kd_resep = $this->input->post('kd_resep');
		$kode_resep = $this->input->post('kd_resep');
		$kode_bayar = $this->input->post('kd_bayar');
		$kd_bayar = $this->input->post('kd_bayar');
		$id_tarif = $this->input->post('id_tarif');
		$kd_resep = $this->input->post('kd_resep');
		$id_periksa = $this->input->post('id_periksa');
		$tanggal_bayar = $this->input->post('tanggal_bayar');
		$total = $this->input->post('total');
		$tambah = $this->input->post('tambah');
		$save = $this->input->post('save');
		$id_admin = $this->db->query("SELECT id_admin FROM admin WHERE username='$username'")->row_array();

		$subtotal = $this->Resep_model->hitungjumlahbayar('detail_bayar', ['kd_bayar' => $kd_bayar]);
		$cek = $this->db->query("SELECT subtotal FROM resep WHERE kd_resep='$kd_resep' ")->row_array();
		$totalbayar = floatval($subtotal) + $cek['subtotal'];


		if ($tambah) {	
			
			$data = array(
			
			'kd_bayar' => $kd_bayar,
			'id_tarif' => $id_tarif,
			'total'  => $total
		); 
		
		$this->Pembayaran_model->input_data1($data, 'detail_bayar');
		redirect('pembayaran/tambah/'.$kd_resep,'');
		}elseif($save){
			$data = array(
			'kd_resep' => $kd_resep,
			'kd_bayar' => $kd_bayar,
			'id_pemeriksaan' => $id_periksa,
			'totalbayar' => $totalbayar,
			'tanggal_bayar' => $tanggal_bayar,
			'id_admin' => $id_admin['id_admin']
		); 
		
		$this->Pembayaran_model->input_data($data, 'pembayaran');
		redirect('pembayaran/lihat/'.$kd_resep,'');
		}
	}


	public function lihat($kd_resep)
	{

		$judul['judul'] = 'Halaman Detail Data Pembayaran';
		$data['kodebayar'] = $this->m_id->buat_kode_bayar();
		$kodebayar = $this->m_id->buat_kode_bayar();
		$where = array('kd_resep' => $kd_resep);
		$data['kode'] = $this->Pembayaran_model->tampil_detail($where)->result();
		$data['pembayaran'] = $this->db->query("SELECT * FROM pembayaran where kd_resep = '$kd_resep'")->result();
		$data['kd_bayar'] =  $this->db->query("SELECT kd_bayar FROM pembayaran where kd_resep = '$kd_resep'")->result();
		$data['pemeriksaan'] = $this->Pembayaran_model->getBayar($where);
		$data['bayar'] = $this->db->query("SELECT * FROM detail_bayar JOIN tarif on detail_bayar.id_tarif = tarif.id_tarif WHERE kd_bayar='$kodebayar'")->result();
		$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pembayaran/lihat', $data);
		$this->load->view('templates/home_footer');
		
		}

	function hapus_detail_bayar($kodebayar)
	{
		$where = array('kd_bayar' => $kodebayar);
		$this->Pembayaran_model->hapus($where, 'detail_bayar');
		redirect('pembayaran/index');
	}

	public function hapus($kd_bayar)
	{
		$where = array('kd_bayar' => $kd_bayar);
		$this->Pembayaran_model->hapus_bayar($where, 'pembayaran');
		redirect('pembayaran/index');
	}



		

	
	

	
	public function periksa($kd_rm)
	{

		$judul['judul'] = 'Pemeriksaan';
		$data['desc'] = 'Informasi Pasien';
		$data['kodeperiksa'] = $this->m_id->buat_kode_periksa();
		$data['tanggal'] = date("d-m-Y");
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		$where1 = array('kd_rm' => $kd_rm);
		$data1['pasien'] = $this->Pemeriksaan_model->tampil_detail($where1)->result();
		$data2['pemeriksaan'] = $this->Pemeriksaan_model->tampil_pemeriksaan($where1)->result();
		$data['dokter'] = $this->db->get_where('dokter',['username' => $this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/home_header', $judul);
		$this->load->view('templates/home_sidebar',$data);
		$this->load->view('templates/home_topbar', $data);
		$this->load->view('pemeriksaan/detail', $data1);
		$this->load->view('pemeriksaan/input', $data2);
		$this->load->view('templates/home_footer');
		
		
}


	public function cek_tarif()
	{
		$id_tarif = $this->input->post('id_tarif');
		$cek = $this->db->query("SELECT * FROM tarif WHERE id_tarif='$id_tarif'")->row();
		$data = array(
			'harga' => $cek->harga,
			'id_tarif' => $cek->id_tarif
		);
		echo json_encode($data);
	}

	public function cek_harga()
	{
		$kd_resep = $this->input->post('kd_resep');
		$cek = $this->db->query("SELECT * FROM resep WHERE kd_resep='$kd_resep'")->row();
		$data = array(
			'subtotal' => $cek->subtotal,
			'kd_resep' => $cek->kd_resep
		);
		echo json_encode($data);
	}

	
/*LAPORAN TRANSAKSI*/

	function laporan(){

		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 

			$filter = $_GET['filter'];     

			if($filter == '1'){               
				$tanggal1 = $_GET['tanggal'];  
				$tanggal2 = $_GET['tanggal2'];                               
				$ket = 'Data Pembayaran dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' - '.date('d-m-y', strtotime($tanggal2));                
				$url_cetak = 'pembayaran/cetak1?tanggal1='.$tanggal1.'&tanggal2='.$tanggal2.'';                
				$pembayaran = $this->Pembayaran_model->view_by_date($tanggal1,$tanggal2);             
			}

			else if($filter == '2'){                
			$kd_rm = $_GET['kd_rm'];                                              
			$ket = 'Data Pembayaran ';                
			$url_cetak = 'pembayaran/cetak2?&kd_rm='.$kd_rm;                
			$pembayaran = $this->Pembayaran_model->view_by_kd_rm($kd_rm);             
			}

			// else if($filter == '3'){                
			// $kelas = $_GET['kd_pasien'];                                                
			// $ket = 'Data Pasien '.$pasien;                
			// $url_cetak = 'pemeriksaan/cetak3?&pasien='.$pasien;                
			// $pasien = $this->Pemeriksaan_model->view_by_kd_pasien($pasien)->result();             
			// }

		   

		}

		else{ 

			$ket = 'Semua Data Pembayaran';            
			$url_cetak = 'pembayaran/cetak';            
			$pembayaran = $this->Pembayaran_model->view_all(); 

		}

		 	$data['ket'] = $ket;    
		 	$data['url_cetak'] = base_url($url_cetak);    
		 	$data['pembayaran'] = $pembayaran;       
		 	 	$data['kd_rm'] = $this->Pemeriksaan_model->kd_rm();   
		 	$data['judul'] = 'Laporan Data Pembayaran';
			$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
							
			$this->load->view('templates/home_header', $data);
			$this->load->view('templates/home_sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pembayaran/laporan', $data);
			$this->load->view('templates/home_footer');
		
	}     

	public function cetak(){    
                             
		$ket = 'Semua Data Pembayaran';
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 Tanjungjaya';

	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['pembayaran'] = $this->Pembayaran_model->view_all(); 
	  	$data['ket'] = $ket;  
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pembayaran/preview', $data);    
	  	
	}

	public function cetak1(){    

	  	$tanggal1 = $_GET['tanggal1'];  
		$tanggal2 = $_GET['tanggal2'];                               
		$ket = 'Data Pembayaran dari Tanggal '.date('d-m-y', strtotime($tanggal1)).' s/d '.date('d-m-y', strtotime($tanggal2));
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 Tanjungjaya';

	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['pembayaran'] = $this->Pembayaran_model->view_by_date($tanggal1,$tanggal2);  
	  	$data['ket'] = $ket;  
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pembayaran/preview', $data);    
	  	
	}

	public function cetak2(){    

	  	$kd_rm = $_GET['kd_rm'];                                              
		$ket = 'Kode RM   '   .$kd_rm  ; 
		$alamat = 'Kp. Cibereum No.18 RT/RW 04/01 Tanjungjaya';                          
	  	ob_start();   
	  	require('assets/pdf/fpdf.php');  
	  	$data['pembayaran'] = $this->Pembayaran_model->view_by_kd_rm($kd_rm);
	  	 $data['kd_rm'] = $this->db->query("SELECT * FROM pasien  where kd_rm = '$kd_rm'")->result();
	  	$data['ket'] = $ket; 
	  	$data['alamat'] = $alamat;
	  	$this->load->view('pembayaran/preview', $data);    
	  	
	}



	function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'id_tarif' => $this->input->post('id_tarif'), 
            'nama_tarif' => $this->input->post('nama_tarif'), 
            'harga' => $this->input->post('harga'), 
        );
        $this->pembayaran->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }
 
    function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->pembayaran->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['nama_tarif'].'</td>
                    <td>'.number_format($items['harga']).'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id_tarif="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->pembayaran->total()).'</th>
            </tr>
        ';
        return $output;
    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
        );
        $this->car->update($data);
        echo $this->show_cart();
    }
		

	

}