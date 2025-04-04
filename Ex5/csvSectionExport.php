<?php
include_once 'autoloader.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="export.csv"');

$sectionsTab = new Section();

$sections = $sectionTab->findAll(PDO::FETCH_ASSOC);

$output = fopen('php://output', 'w');

fputcsv($output, $section->keys());

foreach($sections as $section) {
    fputcsv($output, $section);
}

fclose($output);