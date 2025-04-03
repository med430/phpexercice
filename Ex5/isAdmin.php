<?php
include_once 'isAuthenticated.php';
if(!($_SESSION["role"] == "Admin")) {
    header('location: index.php');
    exit();
}