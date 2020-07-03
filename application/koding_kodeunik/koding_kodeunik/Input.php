<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {
	function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('nip')){
            redirect(base_url("auth"));
        }
        $this->load->database();
        $this->load->model('m_id');
        $this->load->model('m_kelas');
		$this->load->model('m_admin');
        $this->load->model('m_siswa');
		$this->load->helper('url');
	}
	
	public function input_admin(){
		$data['title'] = 'Input data admin';

		$data['user'] = $this->db->get_where('user',['nip' => $this->session->userdata('nip')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/input_user');
		$this->load->view('templates/footer');
	}
	public function reg_admin(){
        

        $nip= $this->input->post('nip');
        $nama_guru= $this->input->post('nama_guru');
        $jk= $this->input->post('jk');
        $tempat_lahir= $this->input->post('tempat_lahir');
        $tgl_lahir= $this->input->post('tgl_lahir');
        $alamat= $this->input->post('alamat');
        $no_hp= $this->input->post('no_hp');
        $jabatan= $this->input->post('jabatan');
        $password= $this->input->post('password');
        $id_level= $this->input->post('id_level');
        $akun_aktif= $this->input->post('akun_aktif');
        
        if (!empty($_FILES['image']['name'])) {
            $upload = $this->_do_upload();
            $data['image'] = $upload;
        }
        
        $data = array(
            'nip' => $nip, 
            'nama_guru' => $nama_guru,
            'jk' => $jk,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'jabatan' => $jabatan,
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'id_level' => $id_level,
            'akun_aktif' => $akun_aktif,
            'waktu_dibuat' => time(),
            'image' => $upload
            
        );

        $this->m_admin->input_data_admin($data,'user');
        redirect('admin');
    }

    private function _do_upload()
    {
        $config['upload_path']      = 'images/admin/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_widht']            = 1000;
        $config['max_height']       = 1000;
        $config['file_name']            = round(microtime(true)*1000);
 
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
            redirect('admin');
        }
        return $this->upload->data('file_name');
    }
    public function input_siswa(){
        $data['title'] = 'Input data siswa';

        $data['user'] = $this->db->get_where('user',['nip' => $this->session->userdata('nip')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/input_siswa');
        $this->load->view('templates/footer');
    }
    public function reg_siswa(){
        

        $nis= $this->input->post('nis');
        $nama_siswa= $this->input->post('nama_siswa');
        $jk= $this->input->post('jk');
        $id_kelas= $this->input->post('id_kelas');
        $tempat_lahir= $this->input->post('tempat_lahir');
        $tgl_lahir= $this->input->post('tgl_lahir');
        $agama= $this->input->post('agama');
        $alamat= $this->input->post('alamat');
        $password= $this->input->post('password');
        $id_level= $this->input->post('id_level');
        
        
        $data = array(
            'nis' => $nis, 
            'nama_siswa' => $nama_siswa,
            'jk' => $jk,
            'id_kelas' => $id_kelas,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'agama' => $agama,
            'alamat' => $alamat,
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'id_level' => "4"
            
        );

        $this->m_siswa->input_data_siswa($data,'siswa');
        redirect('siswa');
    }
     public function input_kelas(){
        $data['title'] = 'Input data kelas';

        $data['user'] = $this->db->get_where('user',['nip' => $this->session->userdata('nip')])->row_array();
        $data1['kodeunik'] = $this->m_id->buat_kode();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelas/input_kelas',$data1);
        $this->load->view('templates/footer');
    }
    public function reg_kelas(){
        if($_POST){
            $id=$this->input->post('idkelas');
            $nama=$this->input->post('nama_kelas');
            $this->m_id->input_kode(array(
                'id_kelas' =>$id,
                'nama_kelas' =>$nama
                ));
        }
        redirect("kelas");
    }

}