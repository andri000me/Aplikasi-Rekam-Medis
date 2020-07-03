<?php
$pdf = new FPDF("L","cm","F4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// $pdf->Image('assets/img/aplikasi/logo.png',2.5,0.5,3,2.5);
$pdf->SetX(8);            
$pdf->MultiCell(19.5,0.7,"DOKTER PRAKTIK PERORANGAN",0,'C');   
$pdf->SetFont('Times','B',14); 
$pdf->SetX(8);
$pdf->MultiCell(19.5,0.7,"DOKTER CECEP ISMAWAN",0,'C');
$pdf->SetFont('Times','',12); 
$pdf->SetX(8);
$pdf->MultiCell(19.5,0.7,''.$alamat.'',0,'C');
$pdf->Line(2,3.1,31,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(2,3.2,31,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->MultiCell(31,0.7,"DATA PASIEN",0,'C'); 
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(31,0.7,''.$ket.'',0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,0.6,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(3.5, 0.8, 'KODE RM', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NAMA', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'JENIS KELAMIN', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'TAMPAT LAHIR', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'TANGGAL LAHIR', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'ALAMAT', 1, 0, 'C');
$pdf->ln();

        foreach($pasien as $data){
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(3.5, 0.6, $data->kd_rm ,1, 0, 'C');
            $pdf->Cell(5, 0.6, $data->nama_pasien,1, 0, 'C');
            $pdf->Cell(4, 0.6, $data->jenkel,1, 0, 'C');
            $pdf->Cell(4, 0.6, $data->tempat_lahir,1, 0, 'C');
            $pdf->Cell(4, 0.6, $data->tanggal_lahir,1, 0, 'C');
            $pdf->Cell(4, 0.6, $data->alamat,1, 0, 'C');
            $pdf->ln();
        }

$pdf->Output("Laporan Pasien.pdf","I");
?>