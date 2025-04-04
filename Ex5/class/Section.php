<?php
class Section extends Repository {
    public function __construct() {
        parent::__construct("Section");
        $this->actions = [new Action("lister", "lister-icon.jpg", "index.php", "utilisateur")];
    }

    public function vars($element) {
        return ["section"=>$element->id];
    }
}