	
<?php
class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        is_logged_in();

        if ($this->session->userdata('level')!="admin") {
            redirect('inventory/blocked');
        }

        $this->load->model('m_data');
        $this->load->model('m_laporan');
        $this->load->helper('url');
    }

    public function index()
    {
        $data_user['tbl_user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['jual_bln'] = $this->m_laporan->get_bulan_jual();
        $data['jual_thn'] = $this->m_laporan->get_tahun_jual();
        $data['beli_bln'] = $this->m_laporan->get_bulan_beli();
        $data['beli_thn'] = $this->m_laporan->get_tahun_beli();
        $this->load->view('templates/header', $data_user);
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/index.php', $data);
        $this->load->view('templates/footer');
    }

    function lap_barang()
    {
        $x['data'] = $this->m_laporan->get_barang();
        $this->load->view('laporan/lap_barang', $x);
    }
    function lap_pembelian()
    {
        $x['data'] = $this->m_laporan->get_pembelian();
        $this->load->view('laporan/lap_pembelian', $x);
    }
    function lap_penjualan()
    {
        $x['data'] = $this->m_laporan->get_penjualan();
        $this->load->view('laporan/lap_penjualan', $x);
    }
    function lap_penjualan_perbulan()
    {
        $bulan = $this->input->post('bln');
        $x['data'] = $this->m_laporan->get_jual_perbulan($bulan);
        $this->load->view('laporan/lap_jual_perbulan', $x);
    }
    function lap_pembelian_perbulan()
    {
        $bulan = $this->input->post('bln');
        $x['data'] = $this->m_laporan->get_beli_perbulan($bulan);
        $this->load->view('laporan/lap_beli_perbulan', $x);
    }
    function lap_penjualan_pertahun()
    {
        $tahun = $this->input->post('thn');
        $x['data'] = $this->m_laporan->get_jual_pertahun($tahun);
        $this->load->view('laporan/lap_jual_pertahun', $x);
    }

    function lap_pembelian_pertahun()
    {
        $tahun = $this->input->post('thn');
        $x['data'] = $this->m_laporan->get_beli_pertahun($tahun);
        $this->load->view('laporan/lap_beli_pertahun', $x);
    }
    function lap_laba_rugi()
    {
        $bulan = $this->input->post('bln');
        $x['jml'] = $this->m_laporan->get_total_lap_laba_rugi($bulan);
        $x['data'] = $this->m_laporan->get_lap_laba_rugi($bulan);
        $this->load->view('admin/laporan/v_lap_laba_rugi', $x);
    }
}
