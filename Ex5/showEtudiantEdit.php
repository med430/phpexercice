<?php
$etudiantsTable = new Etudiant();
$sections = new Section();
function showEtudiantEdit($etudiant) {
    global $sections;
    ?>
    <div class="container relative x-y-centered">
        <form action="" method="POST" enctype="multipart/form-data">
            id: <?= $etudiant["id"] ?>
            <input type="text" name="name" value="<?= $etudiant["name"] ?>">
            <input type="date" name="birthday" value="<?= $etudiant["birthday"] ?>">
            <input type="file" name="image" accept="image/*">
            <img src="<?= $etudiant["image"] ?>" alt="<?= $etudiant["name"] ?>">
            <select name="section" id="section">
                <?php foreach($sections->findAll() as $section): ?>
                    <option value="<?= $section->id ?>"
                        <?php if($etudiant["section"] === $section->id) {
                            echo "selected";
                        }
                        ?>
                    ><?= $section->designation ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" value="Changer le profil de l'étudiant">
        </form>
    </div>
    <?php
}