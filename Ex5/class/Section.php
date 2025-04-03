<?php
class Section extends Repository {
    function __construct() {
        parent::__construct("Section");
        $this->actions = ["img/lister-icon.png"=>"index.php"];
    }
}