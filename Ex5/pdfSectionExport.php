<?php
include_once 'autoloader.php';
require('fpdf/fpdf.php');

$sectionsTab = new Section();

$sections = $sectionsTab->findAll(PDO::FETCH_ASSOC);

// Dummy data (you can fetch from DB)
$headers = $sectionsTab->keys();
$data = $sections;

// Create the PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Header row
foreach ($headers as $col) {
    $pdf->Cell(40, 10, $col, 1); // width, height, text, border
}
$pdf->Ln(); // line break

// Data rows
$pdf->SetFont('Arial', '', 12);
foreach ($data as $row) {
    foreach ($row as $col) {
        $pdf->Cell(40, 10, $col, 1);
    }
    $pdf->Ln();
}

$pdf->Output('D', 'table.pdf'); // D = download
