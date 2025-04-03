<?php
class Etudiant extends Repository {
    function __construct() {
        parent::__construct("Etudiant");
        $this->actions = ["info-icon.jpg"=>"detailEtudiant.php?id=", "eraser-icon.png"=>"deleteEtudiant.php?id=", "write-icon.jpg"=>""];
    }

    function showFilter($elements) {
        ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <?php foreach($this->keys() as $key): ?>
                        <th scope="col"><?= $key ?></th>
                        <?php endforeach ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($elements as $index=>$element): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <?php foreach($element as $key=>$val): ?>
                            <?php if($key=="image" && !($val==null)): ?>
                                <td>
                                    <img src="uploads/img/<?= $val ?>" alt="image Etudiant" width="300">
                                </td>
                            <?php elseif($key=="section"): ?>
                                <td>
                                    <?php
                                        $section = new Section();
                                        $sec = $section->findById($val);
                                        echo $sec["designation"];
                                    ?>
                                </td>
                            <?php else: ?>
                                <td>
                                    <?= $val ?>
                                </td>
                            <?php endif ?>
                        <?php endforeach ?>
                        
                        <td>
                            <?php foreach($this->actions as $action=>$href): ?>
                                <a href="<?= $href . $element->id ?>">
                                    <img src="img/<?= $action ?>" alt="<?= $action ?>" width="30">
                                </a>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php
    }

    function show() {
        $elements = $this->findAll();
        ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <?php foreach($this->keys() as $key): ?>
                        <th scope="col"><?= $key ?></th>
                        <?php endforeach ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($elements as $index=>$element): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <?php foreach($element as $key=>$val): ?>
                            <?php if($key=="image" && !($val==null)): ?>
                                <td>
                                    <img src="uploads/img/<?= $val ?>" alt="image Etudiant" width="300">
                                </td>
                            <?php elseif($key=="section"): ?>
                                <td>
                                    <?php
                                        $section = new Section();
                                        $sec = $section->findById($val);
                                        echo $sec["designation"];
                                    ?>
                                </td>
                            <?php else: ?>
                                <td>
                                    <?= $val ?>
                                </td>
                            <?php endif ?>
                        <?php endforeach ?>
                        
                        <td>
                            <?php foreach($this->actions as $action=>$href): ?>
                                <a href="<?= $href . $element->id ?>">
                                    <img src="img/<?= $action ?>" alt="<?= $action ?>" width="30">
                                </a>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php
    }
}