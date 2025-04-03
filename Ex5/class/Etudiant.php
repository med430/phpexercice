<?php
class Etudiant extends Repository {
    function __construct() {
        parent::__construct("Etudiant");
        $this->actions = ["info-icon.jpg"=>"", "eraser-icon.png"=>"", "write-icon.jpg"=>""];
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
                                    <img src="img/<?= $val ?>" alt="image Etudiant" width="100">
                                </td>
                            <?php else: ?>
                                <td>
                                    <?= $val ?>
                                </td>
                            <?php endif ?>
                        <?php endforeach ?>
                        
                        <td>
                            <?php foreach($this->actions as $action=>$href): ?>
                                <a href="<?= $href ?>">
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