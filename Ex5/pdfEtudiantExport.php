<?php
include_once 'autoloader.php';
require('fpdf/fpdf.php');

$etudiantsTable = new Etudiant();

$etudiants = $etudiantsTable->findAll(PDO::FETCH_ASSOC);

$sections = new Section();

for($i = 0; $i<count($etudiants); $i++) {
    $etudiants[$i]["section"] = $sections->findById($etudiants[$i]["section"])["designation"];
}

$headers = $etudiantsTable->keys();
$data = $etudiants;

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
