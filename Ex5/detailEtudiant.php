<?php
include_once 'autoloader.php';
include_once 'isAuthenticated.php';
if(!isset($_GET["id"])) {
    header('location: index.php');
    exit();
}
$etudiantsTab = new Etudiant();
$sectionsTab = new Section();
$etudiant = $etudiantsTab->findById($_GET["id"]);
$nameEtudiant = $etudiant["name"];
$pageTitle = $nameEtudiant;
include_once 'fragments/header.php';
$sectionEtudiant = $sectionsTab->findById($etudiant["section"]);
$birthdayEtudiant = $etudiant["birthday"];
$designationSection = $sectionEtudiant["designation"];
?>
<div class="container absolute x-y-centered">
    >
    <br>
    <?= $designationSection ?>
    <br>
    <?= $birthdayEtudiant ?>
</div>

<?php include 'fragments/footer.php'; ?>