<?php
    include_once "autoloader.php";
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $repository = new Repository("student");
        $student = $repository->findById($id);
        $name = $student["name"];
        $dateDeNaissance = $student["date_de_naissance"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title><?= $name ?></title>
</head>
<body>
    <div class="container">
        <h1><?= $name ?> ></h1>
        <h6>GI</h6>
        <h6><?= $dateDeNaissance ?></h6>
    </div>
</body>
</html>