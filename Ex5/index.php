<?php
$pageTitle = "index";
include_once 'autoloader.php';
include_once 'fragments/header.php';
$etudiantsTable = new Etudiant();
?>
<canvas id="canvas"></canvas>

<script src="canvas.js"></script>

<div class="container absolute x-y-centered">
    <div class="alert alert-light">Liste des étudiants</div>
    <form action="">
        <div class="container bg-light">
            <input type="text" placeholder="Veuillez renseignez votre id" name="id">
            <input type="submit" class="btn btn-danger" value="Filtrer">
            <a href="">
                <img src="img/ajouter-personne-icon.png" alt="ajouter étudiant" width="30">
            </a>
        </div>
        <div class="container bg-light inline-block">
            <button>Copy</button>
            <button>Excel</button>
            <button>csv</button>
            <button>PDF</button>
            <div class="container relative right inline-block">
                Search:
                <input type="text" name="name">
            </div>
        </div>
    </form>
    <?php $etudiantsTable->show(); ?>
</div>

<?php include_once 'fragments/footer.php' ?>