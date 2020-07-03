<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_id extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	public function buat_kode()   {
		  $this->db->select('RIGHT(pasien.kd_rm,5) as kode', FALSE);
		  $this->db->order_by('kd_rm','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $tgl=date('y');
		  $kodemax=str_pad($kode,5,"0",STR_PAD_LEFT);//angka 3 meunjukan jumlah digit angka 0
		  $kodejadi="RM".$tgl.$kodemax; //hasilnya KLS-1026-001 dst. 
		  return $kodejadi;
	}

	public function buat_kode_periksa()   {
		  $this->db->select('RIGHT(pemeriksaan.id_periksa,4) as kode', FALSE);
		  $this->db->order_by('id_periksa','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pemeriksaan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		 $tgl=date('y');
		  $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);//angka 3 meunjukan jumlah digit angka 0
		  $kodejadi="PRS".$tgl.$kodemax; //hasilnya KLS-1026-001 dst. 
		  return $kodejadi;
	}

	public function buat_kode_resep()   {
		  $this->db->select('RIGHT(resep.kd_resep,4) as kode', FALSE);
		  $this->db->order_by('kd_resep','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('resep');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $tgl=date('y');
		  $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);//angka 3 meunjukan jumlah digit angka 0
		  $kodejadi="RSP".$tgl.$kodemax; //hasilnya KLS-1026-001 dst. 
		  return $kodejadi;
	}

	

	public function buat_kode_bayar()   
	{
		  $this->db->select('RIGHT(pembayaran.kd_bayar,4) as kode', FALSE);
		  $this->db->order_by('kd_bayar','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('pembayaran');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $tgl=date('y');
		  $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);//angka 3 meunjukan jumlah digit angka 0
		  $kodejadi="TRS".$tgl.$kodemax; //hasilnya KLS-1026-001 dst. 
		  return $kodejadi;
	}
	public function buat_kode_masuk()   
	{
		  $this->db->select('RIGHT(obat_masuk.kd_masuk,4) as kode', FALSE);
		  $this->db->order_by('kd_masuk','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('obat_masuk');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $tgl=date('y');
		  $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);//angka 3 meunjukan jumlah digit angka 0
		  $kodejadi="TRIN".$tgl.$kodemax; //hasilnya KLS-1026-001 dst. 
		  return $kodejadi;
	}
}
?>