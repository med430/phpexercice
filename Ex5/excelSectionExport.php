<?php
include_once 'autoloader.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data.xls");
header("Pragma: no-cache");
header("Expires: 0");

$sectionsTab = new Section();

$sections = $sectionsTab->findAll();

?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <?php foreach($sectionsTab->keys() as $key): ?>
                <th scope="col"><?= $key ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($sections as $section): ?>
            <tr>
                <?php foreach($section as $k=>$val): ?>
                <td>
                    <?= $val ?>
                </td>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
