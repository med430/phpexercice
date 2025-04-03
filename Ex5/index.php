<?php
$pageTitle = "index";
include_once 'autoloader.php';
include_once 'fragments/header.php';
$etudiantsTable = new Etudiant();
?>
<canvas id="canvas"></canvas>

<script src="canvas.js"></script>

<div class="container absolute x-y-centered">
    <?php $etudiantsTable->show(); ?>
</div>

<?php include_once 'fragments/footer.php' ?>