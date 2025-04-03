<?php
session_start();
if(!isset($_SESSION["user"]) && !(basename($_SERVER["PHP_SELF"]) == "login.php" || basename($_SERVER["PHP_SELF"]) == "sign_in.php")) {
    header("location: login.php");
    exit();
}