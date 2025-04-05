<?php
include_once 'autoloader.php';
include_once 'isAuthenticated.php';
$pageTitle = "Liste des sections";
include_once 'fragments/header.php';
$section = new Section();
$page = isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] >= 0 ? (int)$_GET["page"] : header('location: section.php?page=0&pageSize=10');
$pageSize = isset($_GET["pageSize"]) && is_numeric($_GET["pageSize"]) && $_GET["pageSize"] > 0 ? (int)$_GET["pageSize"] : header('location: section.php?page=0&pageSize=10');

$elements = $section->findAll();
$totalPages = ceil(count($elements) / $pageSize);
$elements = array_slice($elements, $page * $pageSize, $pageSize);
?>
<canvas id="canvas"></canvas>
<script src="canvas.js"></script>
<div class="container alert alert-light">
    <div class="container absolute x-y-centered">
        <div class="alert alert-light">Liste des sections</div>
        <a href="">
            <button>Copy</button>
        </a>
        <a href="excelSectionExport.php">
            <button>Excel</button>
        </a>
        <a href="csvSectionExport.php">
            <button>csv</button>
        </a>
        <a href="pdfSectionExport.php">
            <button>PDF</button>
        </a>
        <?php $section->showFilter($elements, $_SESSION["role"]); ?>
        <div class="container">
            <div class="container relative left">
                Showing enteries 1 to <?= $totalPages ?>
            </div>
            <div class="container relative right">
                <form action="" method="GET">
                    <input type="hidden" name="page" value="<?= max($page - 1, 0) ?>">
                    <input type="hidden" name="pageSize" value="<?= $pageSize ?>">
                    <button type="submit" <?= $page <= 0 ? "disabled" : "" ?>>Previous</button>
                </form>
                <?= $page + 1 ?>
                <form action="" method="GET">
                    <input type="hidden" name="page" value="<?= min($page + 1, $totalPages - 1) ?>">
                    <input type="hidden" name="pageSize" value="<?= $pageSize ?>">
                    <button type="submit" <?= $page >= $totalPages - 1 ? "disabled" : "" ?>>Next</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once 'fragments/footer.php'; ?>