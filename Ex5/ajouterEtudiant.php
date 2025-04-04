<?php
include_once 'autoloader.php';
include_once 'isAdmin.php';
$etudiantsTable = new Etudiant();
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
    $etudiantsTable->create(["name"=>$_POST["name"], "birthday"=>$_POST["birthday"], "image"=>$finalImageName, "section"=>$_POST["section"]]);
}
$pageTitle = "Ajouter étudiant";
include_once 'fragments/header.php';
include_once 'showEtudiantEdit.php';
?>

<div class="container absolute x-y-centered">
    <div class="container relative x-y-centered">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" value="">
            <input type="date" name="birthday" value="">
            <input type="file" name="image" accept="image/*">
            <select name="section" id="section">
                <?php foreach($sections->findAll() as $section): ?>
                    <option value="<?= $section->id ?>"><?= $section->designation ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Changer le profil de l'étudiant">
        </form>
    </div>
</div>

<?php include_once 'fragments/footer.php'; ?>