<?php
include_once 'isAuthenticated.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title><?= $pageTitle ?></title>
</head>
<body>
    <nav class="navbar navbar-primary bg-primary">
        <a class="navbar-brand" href="index.php">
            <img src="img/gestion_des_etudiants.png" alt="gestion des étudiants" width="100">
        </a>
        <a href="index.php">
            <span class="navbar-brand mb-0 h1">Navbar</span>
        </a>
        <a href="index.php">
            <span class="navbar-brand mb-0 text-black">Home</span>
        </a>
        <a href="index.php">
            <span class="navbar-brand mb-0 text-black">Liste des étudiants</span>
        </a>
        <a href="section.php">
            <span class="navbar-brand mb-0 text-black">Liste des sections</span>
        </a>
        <a href="logout.php">
            <span class="navbar-brand mb-0 text-black">Logout</span>
        </a>
        <a href="login.php">
            <span class="navbar-brand mb-0 text-black">login</span>
        </a>
        <a href="sign_in.php">
            <span class="nabar-brand mb-0 text-black">sign in</span>
        </a>
    </nav>
