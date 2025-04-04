<?php
include_once 'autoloader.php';
include_once 'isAdmin.php';
if(!isset($_GET["id"])) {
    header('location: index.php');
    exit();
}
$etudiantsTable = new Etudiant();
$etudiant = $etudiantsTable->findById($_GET["id"]);
if($etudiant == false) {
    header('location: index.php');
    exit();
}
$etudiantName = $etudiant["name"];
$pageTitle = "Editeur de profil étudiant " . $etudiantName;
if(isset($_POST["name"])) {
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $uploadDir = "uploads/img";
        $imageFile = $_FILES["image"];
        $imageTmpName = $imageFile["tmp_name"];
        $imageOriginalName = basename($imageFile["name"]);
        $imageExtension = pathinfo($imageOriginalName, PATHINFO_EXTENSION);
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if(in_array(strtolower($imageExtension), $allowedTypes)) {
            $finalImageName = "img_" . time() . "." . $imageExtension;
            $imagePath = $uploadDir . $finalImageName;
            if(!move_uploaded_file($imageTmpName, $imagePath)) {
                echo 'Failed to move the uploaded image';
            }
        }
    } else {
        $finalImageName = null;
    }
    $etudiantsTable->alter(["id"=>$_GET["id"], "name"=>$_POST["name"], "birthday"=>$_POST["birthday"], "image"=>$finalImageName, "section"=>$_POST["section"]]);
}
include_once 'fragments/header.php';
include_once 'showEtudiantEdit.php';
?>

<div class="container absolute x-y-centered">
    <?php showEtudiantEdit($etudiant); ?>
</div>

<?php include_once 'fragments/footer.php'; ?>