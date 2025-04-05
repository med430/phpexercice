<?php
include_once 'autoloader.php';
require('fpdf/fpdf.php');

$sectionsTab = new Section();

$sections = $sectionsTab->findAll(PDO::FETCH_ASSOC);

$headers = $sectionsTab->keys();
$data = $sections;

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

foreach ($headers as $col) {
    $pdf->Cell(40, 10, $col, 1);
}
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
foreach ($data as $row) {
    foreach ($row as $col) {
        $pdf->Cell(40, 10, $col, 1);
    }
    $pdf->Ln();
}

$pdf->Output('D', 'table.pdf');
