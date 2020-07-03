<?php

/**
 * 
 */
class M_laporan extends CI_Model
{

	function get_barang()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_kategori ON tbl_barang.id_kategori = tbl_kategori.id_kategori");
		return $hsl;
	}
	function get_pembelian()
	{
		$hs1 = $this->db->query("SELECT barang_masuk.kd_masuk, tgl_masuk, kd_suplier, subtotal, detail_masuk.kd_barang, nama_barang, nama_kategori, stok, stok_in, stok_tot, harga, total FROM barang_masuk JOIN detail_masuk ON barang_masuk.kd_masuk=detail_masuk.kd_masuk JOIN tbl_kategori ON detail_masuk.id_kategori = tbl_kategori.id_kategori JOIN tbl_barang ON detail_masuk.kd_barang = tbl_barang.kd_barang ORDER BY kd_masuk DESC");
		return $hs1;
	}
	function get_penjualan()
	{
		$hs1 = $this->db->query("SELECT barang_keluar.kd_keluar, tgl_keluar, kd_reseller, subtotal, detail_keluar.kd_barang, nama_barang, nama_kategori, stok, stok_out, stok_tot, harga, total FROM barang_keluar JOIN detail_keluar ON barang_keluar.kd_keluar=detail_keluar.kd_keluar JOIN tbl_kategori ON detail_keluar.id_kategori = tbl_kategori.id_kategori JOIN tbl_barang ON detail_keluar.kd_barang = tbl_barang.kd_barang ORDER BY kd_keluar DESC");
		return $hs1;
	}

	function get_bulan_jual()
	{
		$hsl = $this->db->query("SELECT DISTINCT DATE_FORMAT(tgl_keluar,'%M %Y') AS bulan FROM barang_keluar");
		return $hsl;
	}
	function get_tahun_jual()
	{
		$hsl = $this->db->query("SELECT DISTINCT YEAR(tgl_keluar) AS tahun FROM barang_keluar");
		return $hsl;
	}

	function get_bulan_beli()
	{
		$hsl = $this->db->query("SELECT DISTINCT DATE_FORMAT(tgl_masuk,'%M %Y') AS bulan FROM barang_masuk");
		return $hsl;
	}
	function get_tahun_beli()
	{
		$hsl = $this->db->query("SELECT DISTINCT YEAR(tgl_masuk) AS tahun FROM barang_masuk");
		return $hsl;
	}
	function get_jual_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT barang_keluar.kd_keluar, DATE_FORMAT(tgl_keluar, '%M %Y') AS bulan, DATE_FORMAT(tgl_keluar, '%d %M %Y') AS tgl_keluar, kd_reseller, subtotal, detail_keluar.kd_barang, nama_barang, nama_kategori, stok, stok_out, stok_tot, harga, total
			FROM barang_keluar
			JOIN detail_keluar
			ON barang_keluar.kd_keluar=detail_keluar.kd_keluar 
			JOIN tbl_kategori
			ON detail_keluar.id_kategori=tbl_kategori.id_kategori
			JOIN tbl_barang
			ON detail_keluar.kd_barang=tbl_barang.kd_barang
			WHERE DATE_FORMAT(tgl_keluar, '%M %Y')= '$bulan'
			ORDER BY kd_keluar DESC");
		return $hsl;
	}

	function get_beli_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT barang_masuk.kd_masuk, DATE_FORMAT(tgl_masuk, '%M %Y') AS bulan, DATE_FORMAT(tgl_masuk, '%d %M %Y') AS tgl_masuk, kd_suplier, subtotal, detail_masuk.kd_barang, nama_barang, nama_kategori, stok, stok_in, stok_tot, harga, total
			FROM barang_masuk
			JOIN detail_masuk
			ON barang_masuk.kd_masuk=detail_masuk.kd_masuk 
			JOIN tbl_kategori
			ON detail_masuk.id_kategori=tbl_kategori.id_kategori
			JOIN tbl_barang
			ON detail_masuk.kd_barang=tbl_barang.kd_barang
			WHERE DATE_FORMAT(tgl_masuk, '%M %Y')= '$bulan'
			ORDER BY kd_masuk DESC");
		return $hsl;
	}
	function get_jual_pertahun($tahun)
	{

		$hsl = $this->db->query("SELECT barang_keluar.kd_keluar, YEAR(tgl_keluar) AS tahun, DATE_FORMAT(tgl_keluar, '%M %Y') AS bulan, DATE_FORMAT(tgl_keluar, '%d %M %Y') AS tgl_keluar, kd_reseller, subtotal, detail_keluar.kd_barang, nama_barang, nama_kategori, stok, stok_out, stok_tot, harga, total
			FROM barang_keluar
			JOIN detail_keluar
			ON barang_keluar.kd_keluar=detail_keluar.kd_keluar 
			JOIN tbl_kategori
			ON detail_keluar.id_kategori=tbl_kategori.id_kategori
			JOIN tbl_barang
			ON detail_keluar.kd_barang=tbl_barang.kd_barang
			WHERE YEAR(tgl_keluar)= '$tahun'
			ORDER BY kd_keluar DESC");

		return $hsl;
	}

	function get_beli_pertahun($tahun)
	{

		$hsl = $this->db->query("SELECT barang_masuk.kd_masuk, YEAR(tgl_masuk) AS tahun, DATE_FORMAT(tgl_masuk, '%M %Y') AS bulan, DATE_FORMAT(tgl_masuk, '%d %M %Y') AS tgl_masuk, kd_suplier, subtotal, detail_masuk.kd_barang, nama_barang, nama_kategori, stok, stok_in, stok_tot, harga, total
			FROM barang_masuk
			JOIN detail_masuk
			ON barang_masuk.kd_masuk=detail_masuk.kd_masuk 
			JOIN tbl_kategori
			ON detail_masuk.id_kategori=tbl_kategori.id_kategori
			JOIN tbl_barang
			ON detail_masuk.kd_barang=tbl_barang.kd_barang
			WHERE YEAR(tgl_masuk)= '$tahun'
			ORDER BY kd_masuk DESC");

		return $hsl;
	}
	//=========Laporan Laba rugi============
	function get_lap_laba_rugi($bulan)
	{
		$hsl = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%d %M %Y %H:%i:%s') as jual_tanggal,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon,((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon) AS untung_bersih FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}
	function get_total_lap_laba_rugi($bulan)
	{
		$hsl = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harpok,d_jual_barang_harjul,(d_jual_barang_harjul-d_jual_barang_harpok) AS keunt,d_jual_qty,d_jual_diskon,SUM(((d_jual_barang_harjul-d_jual_barang_harpok)*d_jual_qty)-(d_jual_qty*d_jual_diskon)) AS total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}
}
