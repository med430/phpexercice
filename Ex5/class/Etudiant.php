<?php
class Etudiant extends Repository {
    public function __construct() {
        parent::__construct("Etudiant");
        $this->actions = [new Action("info", "info-icon.jpg", "detailEtudiant.php", "utilisateur"), new Action("erase", "eraser-icon.png", "deleteEtudiant.php", "Admin"), new Action("write", "write-icon.jpg", "editEtudiant.php", "Admin")];
    }
    
    public function vars($element) {
        return ["id"=>$element->id];
    }

    public function showElement($k, $v) {
        if($k === "image") {
            ?>
                <img src="uploads/img<?= $v ?>" alt="">
            <?php
        } elseif($k === "section") {
            $section = new Section();
            $sectionName = $section->findById($v)["designation"];
            echo $sectionName;
        } else {
            echo $v;
        }
    }
}