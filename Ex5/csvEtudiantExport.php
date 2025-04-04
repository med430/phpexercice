<?php
include_once 'autoloader.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="export.csv"');

$etudiantsTable = new Etudiant();

$etudiants = $etudiantsTable->findAll(PDO::FETCH_ASSOC);

$output = fopen('php://output', 'w');

fputcsv($output, $etudiantsTable->keys());

foreach($etudiants as $etudiant) {
    fputcsv($output, $etudiant);
}

fclose($output);