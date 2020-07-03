
<?php 

class Resep_model extends CI_Model {

 function getAllResep($id_periksa)
	{
		$this->db->select('*');
		$this->db->from('resep');
		$this->db->join('pemeriksaan', 'resep.id_pemeriksaan = pemeriksaan.id_periksa');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		return $query = $this->db->get()->result_array();
		
 
        

	}
	function getResep($where)
	{
		$this->db->select('*');
		$this->db->from('detail_resep');
		$this->db->join('obat', 'detail_resep.id_obat = obat.id_obat');
		$this->db->join('resep', 'detail_resep.kd_resep = resep.kd_resep');
		$this->db->join('pemeriksaan', 'resep.id_pemeriksaan = pemeriksaan.id_periksa' );
		$this->db->where_in('id_periksa', $where);
		// $this->db->order_by('kd_resep' , 'DESC');
		return $query = $this->db->get();
	}

	function getsub($where)
	{
		$this->db->select('*');
		$this->db->from('resep');
		$this->db->join('pemeriksaan', 'resep.id_pemeriksaan = pemeriksaan.id_periksa' );
		$this->db->where_in('id_periksa', $where);
		return $query = $this->db->get();
	}
  

	public function hitungjumlah($table, $where)
	{
		$this->db->select_sum('total');
		$query = $this->db->get_where($table, $where);
		if ($query->num_rows() > 0) {
			return $query->row()->total;
		} else {
			return 0;
		}
	}

	public function hitungjumlahbayar($table, $where)
	{
		$this->db->select_sum('total');
		$query = $this->db->get_where($table, $where);
		if ($query->num_rows() > 0) {
			return $query->row()->total;
		} else {
			return 0;
		}
	}

	public function hitung($table, $where)
	{
		$this->db->select_sum('total');
		$query = $this->db->get_where($table, $where);
		if ($query->num_rows() > 0) {
			return $query->row()->total;
		} else {
			return 0;
		}
	}

	public function hitungtotalbayar($table, $where)
	{
		$this->db->select_sum('harga');
		$query = $this->db->get_where($table, $where);
		if ($query->num_rows() > 0) {
			return $query->row()->harga;
		} else {
			return 0;
		}
	}


	public function getPemeriksaanById($id_periksa)
	{
		return $this->db->get_where('resep', ['kd_resep' => $id_periksa ])->row_array();
	}

	function tampil_detail($where)
	{
		$this->db->select('*');    
		$this->db->from('pasien');
		$this->db->join('pemeriksaan', 'pasien.kd_rm = pemeriksaan.kd_rm');
		$this->db->where_in('id_periksa',$where);
		return $query = $this->db->get();
	}

	

	function tampil()
	{
		 $query = "SELECT `resep`.`kd_resep` , `resep`.`subtotal`
		 FROM  `resep` ";
		$resep = $this->db->query($query)->result_array();
        return $resep;

	}

	function tampil_bayar($where)
	{

		$this->db->select('*');    
		$this->db->from('detail_resep');
		$this->db->join('obat', 'detail_resep.id_obat = obat.id_obat');
		$this->db->where_in('kd_bayar', $where);
		return $query = $this->db->get();
	}


	function detail()
	{
		 $this->db->select('*');    
		$this->db->from('obat');
		$this->db->join('detail_resep', 'obat.id_obat = detail_resep.id_obat');
		return $query = $this->db->get();

	}

	public function getResepById($kd_resep)
	{
		return $this->db->get_where('resep_obat', ['kd_resep' => $kd_resep ])->row_array();
	}

	
	public function getRMById($id_periksa)
	{
		return $this->db->get_where('pemeriksaan', ['id_periksa' => $id_periksa ])->row_array();
	}

	public function hapus_data($id_detail)
	{
		$this->db->where('id_detail', $id_detail);
		$this->db->delete('detail_resep');		
	}


	public function hapus_data_masuk($kd_masuk)
	{
		$this->db->where('kd_masuk', $kd_masuk);
		$this->db->delete('obat_masuk');		
	}

	function hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	


	public function tambah_data() 
	{
		$data = [
		
		'kd_rm' => $this->input->post('kd_rm'),
		'aturan_pakai' => $this->input->post('aturan_pakai'),
		'id_obat' => $this->input->post('id_obat') ];
		
		$this->db->insert('resep_obat', $data);
	}

	public function ubah_data() 
	{
		$data = [
			'id_rm' => $this->input->post('id_rm'),
		'aturan_pakai' => $this->input->post('aturan_pakai')
		

	];
		$this->db->where('kd_resep', $this->input->post('kd_resep') );
		$this->db->update('resep_obat', $data);
	}

	function jumlahresep(){
		$query=$this->db->get('resep_obat');
		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}


	function get_obat($id_obat){
        $query = $this->db->get_where('obat', array('id_obat' => $id_obat));
        return $query;
    }

   function input_data($data, $table) 
	{
		$this->db->insert($table,$data);
	}

	function input_data1($data, $table) 
	{
		$this->db->insert($table,$data);
	}

	function save($data, $table) 
	{
		$this->db->insert($table,$data);
	}
	function save1($data, $table) 
	{
		$this->db->insert($table,$data);
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
		$this->db->join('resep', 'pemeriksaan.id_periksa = resep.id_pemeriksaan');
  		$this->db->where('resep.tanggal_resep BETWEEN"'.date('Y-m-d', strtotime($tanggal1)).'"and"'.date('Y-m-d', strtotime($tanggal2)).'"'); 
  		$this->db->order_by('resep.tanggal_resep');   
  		return $query = $this->db->get()->result_array();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  	}  

  	public function kd_resep(){        
  		$this->db->select('*');    
		$this->db->from('resep');     
  		return $query = $this->db->get()->result();
 
  	}  

 
  	public function view_by_kd_rm($kd_rm){
  		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->join('resep', 'pemeriksaan.id_periksa = resep.id_pemeriksaan');
		$this->db->where('pemeriksaan.kd_rm', $kd_rm);    
  		return $query = $this->db->get()->result_array();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  	} 
  		public function view_by_resep($kd_resep){
  		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->join('resep', 'pemeriksaan.id_periksa = resep.id_pemeriksaan');
		$this->db->join('detail_resep', 'resep.kd_resep = detail_resep.kd_resep');
		$this->db->join('obat', 'detail_resep.id_obat = obat.id_obat');
		$this->db->where('resep.kd_resep', $kd_resep);    
  		return $query = $this->db->get()->result_array();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  	} 
  // 	public function view_by_kd_pasien($kd_pasien){
  // 		$this->db->select('*');    
		// $this->db->from('pasien');
		// $this->db->where('pasien.kd_pasien',$kd_pasien); 
  // 		$this->db->order_by('pasien.kd_pasien');  
  // 		return $query = $this->db->get();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  // 	}

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

		$this->db->select('*');
		$this->db->from('resep');
		$this->db->join('pemeriksaan', 'resep.id_pemeriksaan = pemeriksaan.id_periksa');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		return $query = $this->db->get()->result_array();
		

  	}        


 



}