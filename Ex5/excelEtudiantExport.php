<?php
include_once 'autoloader.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data.xls");
header("Pragma: no-cache");
header("Expires: 0");

$etudiantsTable = new Etudiant();

$sections = new Section();

$etudiants = $etudiantsTable->findAll();

?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <?php foreach($etudiantsTable->keys() as $key): ?>
                <th scope="col"><?= $key ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($etudiants as $etudiant): ?>
            <tr>
                <?php foreach($etudiant as $k=>$val): ?>
                <td>
                    <?php if($k === "section"): ?>
                        <?= $sections->findById($etudiant->section)["designation"] ?>
                    <?php else: ?>
                        <?= $val ?>
                    <?php endif ?>
                </td>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
