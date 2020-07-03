<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_id extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	public function input_kode($data){
		$this->db->insert('kelas',$data);
	}
	public function buat_kode()   {
		  $this->db->select('RIGHT(kelas.id_kelas,3) as kode', FALSE);
		  $this->db->order_by('id_kelas','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('kelas');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax=str_pad($kode,3,"0",STR_PAD_LEFT);//angka 3 meunjukan jumlah digit angka 0
		  $kodejadi="KL".$kodemax; //hasilnya KLS-1026-001 dst. 
		  return $kodejadi;
	}
}
?>