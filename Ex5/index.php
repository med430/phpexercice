<?php
$pageTitle = "index";
include_once 'autoloader.php';
include_once 'fragments/header.php';
$etudiantsTable = new Etudiant();
$page = isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] >= 0 ? (int)$_GET["page"] : header('location: index.php?page=0&pageSize=10');
$pageSize = isset($_GET["pageSize"]) && is_numeric($_GET["pageSize"]) && $_GET["pageSize"] > 0 ? (int)$_GET["pageSize"] : header('location: index.php?page=0&pageSize=10');

if (isset($_GET["section"]) && $_GET["section"] === "") {
    unset($_GET["section"]);
}
if(!isset($_GET["section"]) && !isset($_GET["search"])) {
    $elements = $etudiantsTable->findAll();
} elseif(isset($_GET["section"]) && !isset($_GET["search"])) {
    $elements = $etudiantsTable->find("section = " . $_GET["section"]);
} elseif(!isset($_GET["section"]) && isset($_GET["search"])) {
    $elements = $etudiantsTable->find("name LIKE '%" . $_GET["search"] . "%' OR birthday LIKE '%" . $_GET["search"] . "%'");
} else {
    $elements = $etudiantsTable->find("section = " . $_GET["section"] . " AND (name LIKE '%" . $_GET["search"] . "%' OR birthday LIKE '%" . $_GET["search"] . "%')");
}
$totalPages = ceil(count($elements) / $pageSize);
$elements = array_slice($elements, $page * $pageSize, $pageSize);

if ($page >= $totalPages) {
    $page = $totalPages - 1;
}
if ($page < 0) {
    $page = 0;
}
?>
<canvas id="canvas"></canvas>

<script src="canvas.js"></script>

<div class="container relative x-y-centered">
    <div class="alert alert-light">Liste des étudiants</div>
    <form action="" method="GET">
        <div class="container bg-light">
            <input type="hidden" name="page" value="<?= $page ?>">
            <input type="hidden" name="pageSize" value="<?= $pageSize ?>">
            <input type="text" placeholder="Veuillez renseignez votre section" name="section" value="<?= isset($_GET["section"]) ? $_GET["section"] : "" ?>">
            <input type="submit" class="btn btn-danger" value="Filtrer">
            <?php if($_SESSION["role"] === "Admin"): ?>
                <a href="ajouterEtudiant.php">
                    <img src="img/ajouter-personne-icon.png" alt="ajouter étudiant" width="30">
                </a>
            <?php endif ?>
        </div>
        <div class="container bg-light inline-block">
            <div class="container relative right inline-block">
                Search:
                <input type="text" name="search">
            </div>
        </div>
    </form>
    <a href="">
        <button>Copy</button>
    </a>
    <a href="excelEtudiantExport.php">
        <button>Excel</button>
    </a>
    <a href="csvEtudiantExport.php">
        <button>csv</button>
    </a>
    <a href="pdfEtudiantExport.php">
        <button>PDF</button>
    </a>
    <?php
    $etudiantsTable->showFilter($elements, $_SESSION["role"]);
    ?>
    <div class="container">
        <div class="container relative left">
            Showing enteries 1 to <?= $totalPages ?>
        </div>
        <div class="container relative right">
            <form action="" method="GET">
                <input type="hidden" name="page" value="<?= max($page - 1, 0) ?>">
                <input type="hidden" name="pageSize" value="<?= $pageSize ?>">
                <input type="hidden" name="section" value="<?= isset($_GET["section"]) ? $_GET["section"] : "" ?>">
                <input type="hidden" name="search" value="<?= isset($_GET["search"]) ? $_GET["search"] : "" ?>">
                <button type="submit" <?= $page <= 0 ? "disabled" : "" ?>>Previous</button>
            </form>
            <?= $page + 1 ?>
            <form action="" method="GET">
                <input type="hidden" name="page" value="<?= min($page + 1, $totalPages - 1) ?>">
                <input type="hidden" name="pageSize" value="<?= $pageSize ?>">
                <input type="hidden" name="section" value="<?= isset($_GET["section"]) ? $_GET["section"] : "" ?>">
                <input type="hidden" name="search" value="<?= isset($_GET["search"]) ? $_GET["search"] : "" ?>">
                <button type="submit" <?= $page >= $totalPages - 1 ? "disabled" : "" ?>>Next</button>
            </form>
        </div>
    </div>
</div>

<?php include_once 'fragments/footer.php' ?>