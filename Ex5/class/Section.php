<?php
class Section extends Repository {
    function __construct() {
        parent::__construct("Section");
        $this->actions = ["lister-icon.jpg"=>"index.php"];
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
                        <?php foreach($element as $val): ?>
                        <td><?= $val ?></td>
                        <?php endforeach ?>
                        
                        <td>
                            <?php foreach($this->actions as $action=>$href): ?>
                                <a href="<?= $href ?>?section=<?= $element->id ?>">
                                    <img src="img/<?= $action ?>" alt="Info Icon" width="30">
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
                        <?php foreach($element as $val): ?>
                        <td><?= $val ?></td>
                        <?php endforeach ?>
                        
                        <td>
                            <?php foreach($this->actions as $action=>$href): ?>
                                <a href="<?= $href ?>?section=<?= $element->id ?>">
                                    <img src="img/<?= $action ?>" alt="Info Icon" width="30">
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