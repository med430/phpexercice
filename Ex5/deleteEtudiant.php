<?php
include_once 'autoloader.php';
include_once 'isAdmin.php';
$pageTitle = "Etudiant supprimé";
include_once 'fragments/header.php';
if(!isset($_GET["id"])) {
    header('location: index.php');
    exit();
}
$etudiantsTab = new Etudiant();
$etudiant = $etudiantsTab->findById($_GET["id"]);
$sectionEtudiant = (new Section())->findById($etudiant["section"]);
if($etudiant == false) {
    header('location: index.php');
    exit();
}
$etudiantsTab->delete($_GET["id"]);
?>
<div class="container absolute x-y-centered">
    <?= $etudiant["name"] ?>
    >
    <br>
    <? $sectionEtudiant["designation"] ?>
    <br>
    <?= $etudiant["birthday"] ?>
</div>

<?php include_once 'fragments/footer.php' ?>