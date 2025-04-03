<?php
include_once 'autoloader.php';
include_once 'isAuthenticated.php';
$pageTitle = "Liste des sections";
include_once 'fragments/header.php';
$section = new Section();
?>
<canvas id="canvas"></canvas>
<script src="canvas.js"></script>
<div class="container absolute x-y-centered">
    <div class="alert alert-light">Liste des sections</div>
    <?php $section->show(); ?>
</div>
<?php include_once 'fragments/footer.php'; ?>