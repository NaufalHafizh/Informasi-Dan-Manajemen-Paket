<?php
require '../plugin/FPDF/fpdf.php';
include '../function/connect.php';

var_dump($_GET['ID_Pengiriman']);
$resi = $_GET['ID_Pengiriman'];
$Quary = mysqli_query($con, "SELECT * FROM shipment JOIN kategori ON kategori.ID_Kategori = shipment.ID_Kategori JOIN user_public ON user_public.Username = shipment.Username JOIN ongkir ON ongkir.ID_Ongkir = shipment.ID_Ongkir WHERE shipment.ID_Pengiriman = $resi");

$ambilData = mysqli_fetch_array($Quary);

$total = $ambilData['Ongkos'];


ob_start();
$pdf = new FPDF('L', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(130, 5, 'Fast Parcel', 0, 1);
$pdf->Cell(130, 5, '', 0, 1);

$pdf->Cell(130, 5, 'Invoice', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(20, 5, 'Resi', 0, 0);
$pdf->Cell(130, 5, $ambilData['ID_Pengiriman'], 0, 1);
$pdf->Cell(20, 5, 'Dibuat', 0, 0);
$pdf->Cell(130, 5, $ambilData['Dibuat'], 0, 1);
$pdf->Cell(20, 5, 'Diubah', 0, 0);
$pdf->Cell(130, 5, $ambilData['Diubah'], 0, 1);

$pdf->Cell(130, 5, '', 0, 1);
$pdf->Cell(130, 5, '', 0, 1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(130, 5, 'Pengirim', 0, 0);
$pdf->Cell(130, 5, 'Penerima', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(130, 5, $ambilData['Nama'], 0, 0);
$pdf->Cell(130, 5, $ambilData['Nama_Penerima'], 0, 1);

$pdf->Cell(130, 5, $ambilData['Alamat'], 0, 0);
$pdf->Cell(130, 5, $ambilData['Alamat_Penerima'], 0, 1);

$pdf->Cell(130, 5, '', 0, 1);
$pdf->Cell(130, 5, '', 0, 1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(130, 5, 'Total Biaya', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(10, 5, 'Rp ', 0, 0);
$pdf->Cell(130, 5, number_format($total, 2, ",", "."), 0, 0);

$pdf->Output();
