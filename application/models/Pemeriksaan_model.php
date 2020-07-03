<?php 

class Pemeriksaan_model extends CI_Model {

	public function getAllRM()
	{

		$query = "SELECT `pasien`.`kd_rm` , `pasien`.`nama_pasien` , `pemeriksaan`.`id`,`pemeriksaan`.`kd_rm`,`pemeriksaan`.`keluhan`,`pemeriksaan`.`diagnosa`,`pemeriksaan`.`tindakan`,`pemeriksaan`.`tanggal`,`pemeriksaan`.`obat`
		FROM `pemeriksaan`
		LEFT JOIN `pasien`
		
		ON `pasien`.`kd_rm`=`pemeriksaan`.`kd_rm`
		ORDER BY `pemeriksaan`.`tanggal` DESC ";
		
        $pemeriksaan = $this->db->query($query)->result_array();
        return $pemeriksaan;

		// $this->db->select('*');    
		// $this->db->from('rekam_medis');
		// $this->db->join('pasien', 'rekam_medis.kd_pasien = pasien.kd_pasien');
		// $this->db->join('racik_obat', 'rekam_medis.kd_rm = racik_obat.kd_rm');
		// return $query = $this->db->get();
         

	}

	function tampil_detail($where1)
	{
		$this->db->select('*');    
		$this->db->from('pasien');
		$this->db->where_in('kd_rm',$where1);
		return $query = $this->db->get();
	}

	function tampil_pemeriksaan($where1)
	{
		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->where_in('kd_rm',$where1);
		return $query = $this->db->get();
	}

	public function getAllRMSortRm()
	{
		$query = "SELECT `pemeriksaan`.`kd_rm`
		          FROM  `pemeriksaan` 
		          ORDER BY `tanggal` DESC ";
		$rm = $this->db->query($query)->result_array();
        return $rm;

	}

	function getPemeriksaan()
	{
		$query = "SELECT `pemeriksaan`.`id_periksa`
		          FROM  `pemeriksaan` 
		          ORDER BY `id_periksa` DESC ";
		$periksa = $this->db->query($query)->result_array();
        return $periksa;

	}

	
	public function getRMById($kd_rm)
	{
		return $this->db->get_where('pemeriksaan', ['kd_rm' => $kd_rm ])->row_array();
	}

	
	public function input_data($data, $table) 
	{
		$this->db->insert($table,$data);
	}

	function ubah_data($kd_rm)
	{
		$data = [
		
		'kd_rm' => $this->input->post('kd_rm'),
		'id_pasien' => $this->input->post('id_pasien'),
		'keluhan' => $this->input->post('keluhan'),
		'diagnosa' => $this->input->post('diagnosa'),
		'tindakan' => $this->input->post('tindakan'),
		'tanggal' => $this->input->post('tanggal') ];

		$this->db->where('kd_rm', $this->input->post('kd_rm') );
		$this->db->update('pemeriksaan', $data);
	}

	public function hapus_data($id_periksa)
	{
		$this->db->where('id_periksa', $id_periksa);
		$this->db->delete('pemeriksaan');		
	}



	

	

	function jumlahrm(){
		$query=$this->db->get('pemeriksaan');
		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}	
   

   // ob_start();
   // var_dump($pasien);
   // $result = ob_get_contents(); //or ob_get_clean()
   // //ob_end_clean() 

	/*LAPORAN TRANSAKSI*/

  	public function view_by_date($tanggal1, $tanggal2){
  		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
  		$this->db->where('tanggal BETWEEN"'.date('Y-m-d', strtotime($tanggal1)).'"and"'.date('Y-m-d', strtotime($tanggal2)).'"'); 
  		$this->db->order_by('tanggal');   
  		return $query = $this->db->get()->result_array();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  	}  

  	public function kd_rm(){        
  		$this->db->select('*');    
		$this->db->from('pasien');     
  		return $query = $this->db->get()->result();
 
  	}  

  	public function kd_pasien(){
  		$this->db->select('*');    
		$this->db->from('pasien');    
  		return $query = $this->db->get()->result();  
  	}

 
  	public function view_by_kd_rm($kd_rm){
  		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->where('pemeriksaan.kd_rm', $kd_rm); 
  		$this->db->order_by('pemeriksaan.id_periksa');   
  		return $query = $this->db->get()->result_array();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  	} 
  	public function view_by_kd_pasien($kd_pasien){
  		$this->db->select('*');    
		$this->db->from('pasien');
		$this->db->where('pasien.kd_pasien',$kd_pasien); 
  		$this->db->order_by('pasien.kd_pasien');  
  		return $query = $this->db->get();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  	}

  	public function view_by_year($tahun){        
  		$this->db->select('*');    
		$this->db->from('transaksi');
		$this->db->join('siswa', 'transaksi.nis = siswa.nis');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->join('bulan', 'transaksi.id_bulan = bulan.id_bulan');
		$this->db->join('tahun_ajaran', 'tahun_ajaran.id_tahun = transaksi.id_tahun');	
		$this->db->join('user', 'transaksi.user_id = user.user_id');
  		$this->db->where('transaksi.id_tahun="'.$tahun.'"');
  		$this->db->order_by('transaksi.id_tahun');   
  		return $query = $this->db->get(); 
  	}

  	function view_all(){  

  // 		$this->db->select('pasien.kd_pasien');    
		// $this->db->from('rekam_medis');
		// $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
	
		// return $this->db->get()->result();

		$query = "SELECT `pasien`.`kd_rm` , `pasien`.`nama_pasien`, `pasien`.`pengobatan`, `pemeriksaan`.`kd_rm`,`pemeriksaan`.`keluhan`,`pemeriksaan`.`diagnosa`,`pemeriksaan`.`tindakan`,`pemeriksaan`.`tanggal`, `pemeriksaan`.`id_periksa` 
		FROM `pemeriksaan`
		LEFT JOIN `pasien`
		ON `pasien`.`kd_rm`=`pemeriksaan`.`kd_rm`
		ORDER BY `pemeriksaan`.`tanggal` ASC ";
		
        $pemeriksaan = $this->db->query($query)->result_array();
        return $pemeriksaan;

  	}        

  	function view_all1(){  
		$query = "SELECT `pasien`.`kd_rm` , `pasien`.`nama_pasien`, `pasien`.`pengobatan`, `pemeriksaan`.`kd_rm`,`pemeriksaan`.`keluhan`,`pemeriksaan`.`diagnosa`,`pemeriksaan`.`tindakan`,`pemeriksaan`.`tanggal`, `pemeriksaan`.`id_periksa` 
		FROM `pemeriksaan`
		LEFT JOIN `pasien`
		ON `pasien`.`kd_rm`=`pemeriksaan`.`kd_rm`
		ORDER BY `pemeriksaan`.`id_periksa` ASC ";
		
        $pemeriksaan = $this->db->query($query)->result_array();
        return $pemeriksaan;

  	}    

 



}