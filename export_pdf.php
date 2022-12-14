<?php

require('libs/fpdf181/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'REPORT E-LIB',0,1,'C');
$pdf->SetFont('Arial','B',12);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,6,'NAME',1,0);
$pdf->Cell(30,6,'PRIVATE NUMBER',1,0);
$pdf->Cell(50,6,'EMAIL',1,0);
$pdf->Cell(20,6,'DATE',1,0);
$pdf->Cell(15,6,'BOOK ID',1,0);
$pdf->Cell(20,6,'DAY',1,0);
$pdf->Cell(20,6,'TOTAL',1,1);

$pdf->SetFont('Arial','',10);

include 'conn.php';
$data = mysqli_query($mysqli_connect, "select * from loan");
while ($row = mysqli_fetch_array($data)){
    $pdf->Cell(20,6,$row['name'],1,0);
    $pdf->Cell(30,6,$row['private_number'],1,0);
    $pdf->Cell(50,6,$row['email'],1,0);
    $pdf->Cell(20,6,$row['date'],1,0); 
    $pdf->Cell(15,6,$row['id_book'],1,0); 
    $pdf->Cell(20,6,$row['day_total'],1,0); 
    $pdf->Cell(20,6,$row['price'],1,1); 
}

$pdf->Output();
?>