
<?php 

class Pembayaran_model extends CI_Model {

 function getAllBayar()
	{
		$this->db->select('*');
		$this->db->from('resep');
		$this->db->join('pemeriksaan', 'resep.id_pemeriksaan = pemeriksaan.id_periksa');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->order_by('resep.kd_resep', 'DESC' );

		
		return $query = $this->db->get()->result();        

	}

	 function getBayar($where)
	{
		$this->db->select('*');
		$this->db->from('resep');
		$this->db->join('pemeriksaan', 'resep.id_pemeriksaan = pemeriksaan.id_periksa');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->where_in('kd_resep',$where);

		
		return $query = $this->db->get()->result();        

	}

	function tampil_detail($where)
	{
		$this->db->select('*');
		$this->db->from('resep');
		$this->db->where_in('kd_resep',$where);
		return $query = $this->db->get();
	}



	

	function tampil()
	{
		 $query = "SELECT `tarif`.`id_tarif` , `tarif`.`nama_tarif`, `tarif`.`harga` 
		 FROM  `tarif` ";
		$tarif = $this->db->query($query)->result_array();
        return $tarif;

	}

	public function getResepById($kd_resep)
	{
		return $this->db->get_where('resep_obat', ['kd_resep' => $kd_resep ])->row_array();
	}

	
	public function getRMById($id_periksa)
	{
		return $this->db->get_where('pemeriksaan', ['id_periksa' => $id_periksa ])->row_array();
	}

	


	function input_data($data, $table) 
	{
		$this->db->insert($table,$data);
	}

	function input_data1($data, $table) 
	{
		$this->db->insert($table,$data);
	}

		public function hapus_data($id_detail)
	{
		$this->db->where('id_detail', $id_detail);
		$this->db->delete('detail_bayar');		
	}

	public function hapus_data_bayar($kd_bayar)
	{
		$this->db->where('kd_bayar', $kd_bayar);
		$this->db->delete('pembayaran');		
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

	function jumlahbayar(){
		$query=$this->db->get('pembayaran');
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
function hapus($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

function hapus_bayar($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
//laporan

  	public function view_by_date($tanggal1, $tanggal2){
  		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->join('resep', 'pemeriksaan.id_periksa = resep.id_pemeriksaan');
		$this->db->join('pembayaran', 'resep.kd_resep = pembayaran.kd_resep' );
  		$this->db->where('pembayaran.tanggal_bayar BETWEEN"'.date('Y-m-d', strtotime($tanggal1)).'"and"'.date('Y-m-d', strtotime($tanggal2)).'"'); 
  		$this->db->order_by('pembayaran.tanggal_bayar');   
  		return $query = $this->db->get()->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
  	}  

  	public function kd_bayar(){        
  		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->join('resep', 'pemeriksaan.id_periksa = resep.id_pemeriksaan');
		$this->db->join('pembayaran', 'resep.kd_resep = pembayaran.kd_resep' );   
  		return $query = $this->db->get()->result();
 
  	}  

 
  	public function view_by_kd_rm($kd_rm){
  		$this->db->select('*');    
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->join('resep', 'pemeriksaan.id_periksa = resep.id_pemeriksaan');
		$this->db->join('pembayaran', 'resep.kd_resep = pembayaran.kd_resep' );
		$this->db->where('pemeriksaan.kd_rm', $kd_rm);    
  		return $query = $this->db->get()->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
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
		$this->db->from('pemeriksaan');
		$this->db->join('pasien', 'pemeriksaan.kd_rm = pasien.kd_rm');
		$this->db->join('resep', 'pemeriksaan.id_periksa = resep.id_pemeriksaan');
		$this->db->join('pembayaran', 'resep.kd_resep = pembayaran.kd_resep' );
		return $query = $this->db->get()->result();
	}

 function get_all_produk(){
        $hasil=$this->db->get('tarif');
        return $hasil->result();
    }
 



}