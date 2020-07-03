<?php
$pdf = new FPDF("P","cm","F4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// $pdf->Image('assets/img/aplikasi/logo.png',2.5,0.5,3,2.5);
$pdf->SetX(8);            
$pdf->MultiCell(9,0.6,"DOKTER PRAKTIK PERORANGAN",0,'C');   
$pdf->SetFont('Times','B',14); 
$pdf->SetX(8);
$pdf->MultiCell(9,0.6,"DOKTER CECEP ISMAWAN",0,'C');
$pdf->SetFont('Times','',12); 
$pdf->SetX(8);
$pdf->MultiCell(9,0.6,''.$alamat.'',0,'C');
$pdf->Line(2,3.1,31,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(2,3.2,31,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->MultiCell(18,0.7,"DATA TRANSAKSI OBAT MASUK",0,'C'); 
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(18,0.7,''.$ket.'',0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(5,0.6,"Di cetak pada : ".date("d/m/Y"),0,0,'C');
$pdf->ln(1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'KODE TRANSAKSI', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NAMA', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'TOTAL BAYAR', 1, 0, 'C');
$pdf->ln();

if( ! empty($obat_masuk)){
        $no = 1;
        foreach($obat_masuk as $data){
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(1, 0.6, $no++ , 1, 0, 'C');
            $pdf->Cell(3.5, 0.6, date('d-m-Y', strtotime($data->tanggal)),1, 0, 'C');
            $pdf->Cell(3.5, 0.6, $data->kd_masuk,1, 0, 'C');
            $pdf->Cell(5, 0.6, $data->nama,1, 0, 'C');
            $pdf->Cell(3.5, 0.6, 'Rp. '.number_format($data->subtotal,0,',','.'),1, 0, 'L');
         
            $pdf->ln();
        }
    }

$pdf->Output("Laporan Transaksi Obat Masuk.pdf","I");
?>