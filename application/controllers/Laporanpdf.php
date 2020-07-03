<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'DOKTER CECEP ISMAWAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN DATA PASIEN ',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(85,6,'NIK',1,0);
        $pdf->Cell(20,6,'No. BPJS ',1,0);
        $pdf->Cell(27,6,'NAMA PASIEN',1,0);
        $pdf->Cell(25,6,'JENIS KELAMIN',1,0);
        $pdf->Cell(85,6,'TEMPAT LAHIR',1,0);
        $pdf->Cell(25,6,'TANGGAL LAHIR',1,0);
        $pdf->Cell(85,6,'ALAMAT',1,0);
        $pdf->Cell(85,6,'PENANGGUNG JAWAB',1,0);
        $pdf->Cell(85,6,'PENGOBATAN',1,0);
        $pdf->Cell(85,6,'NO. TELP.',1,0);      
        
        $pdf->SetFont('Arial','',10);
        $pasien = $this->db->get('pasien')->result();
        foreach ($pasien as $row){
            $pdf->Cell(20,6,$row->nik,1,0);
            $pdf->Cell(85,6,$row->no_bpjs,1,0);
            $pdf->Cell(27,6,$row->nama_pasien,1,0);
            $pdf->Cell(27,6,$row->jenkel,1,0);
            $pdf->Cell(27,6,$row->tempat_lahir,1,0);
            $pdf->Cell(25,6,$row->tanggal_lahir,1,0);
            $pdf->Cell(27,6,$row->alamat,1,0);
            $pdf->Cell(27,6,$row->penanggung_jawab,1,0);
            $pdf->Cell(27,6,$row->pengobatan,1,0);
            $pdf->Cell(27,6,$row->telp,1,0); 
        }
        $pdf->Output();
    }
}