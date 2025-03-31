<?php
require "Etudiant.php";

$etudiant = new Etudiant("Mohamed", "www");

$etudiant->addNotes(20, 19, 18, 20, 20, 20);

$aymen = new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]);

$skander = new Etudiant("Skander", [15, 9, 8, 16]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php $etudiant->afficherNotes(); ?>
            </div>
            <div class="col">
                <?php $aymen->afficherNotes(); ?>
            </div>
            <div class="col">
                <?php $skander->afficherNotes(); ?>
            </div>
        </div>
    </div>
</body>
</html>