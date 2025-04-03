<?php
$pageTitle = "index";
include_once 'autoloader.php';
include_once 'fragments/header.php';
$etudiantsTable = new Etudiant();
?>
<canvas id="canvas"></canvas>

<script src="canvas.js"></script>

<div class="container relative x-y-centered">
    <div class="alert alert-light">Liste des étudiants</div>
    <form action="" method="GET">
        <div class="container bg-light">
            <input type="text" placeholder="Veuillez renseignez votre section" name="section">
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
                <input type="text" name="search">
            </div>
        </div>
    </form>
    <?php
    if (isset($_GET["section"]) && $_GET["section"] === "") {
        unset($_GET["section"]);
    }
    if(!isset($_GET["section"]) && !isset($_GET["search"])) {
        $etudiantsTable->show();
    } elseif(isset($_GET["section"]) && !isset($_GET["search"])) {
        $etudiantsTable->showFilter($etudiantsTable->find("section = " . $_GET["section"]));
    } elseif(!isset($_GET["section"]) && isset($_GET["search"])) {
        $etudiantsTable->showFilter($etudiantsTable->find("name LIKE '%" . $_GET["search"] . "%' OR birthday LIKE '%" . $_GET["search"] . "%'"));
    } else {
        $etudiantsTable->showFilter($etudiantsTable->find("section = " . $_GET["section"] . " AND (name LIKE '%" . $_GET["search"] . "%' OR birthday LIKE '%" . $_GET["search"] . "%')"));
    }
    ?>
</div>

<?php include_once 'fragments/footer.php' ?>