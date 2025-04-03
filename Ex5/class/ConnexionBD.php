<?php
class ConnexionBD {
    private static $_host = "localhost";
    private static $_dbname = "University";
    private static $_user = "root";
    private static $_pwd = "Abc123987456";
    private static $_bdd = null;
    private function __construct() {
        try {
            self::$_bdd = new PDO("mysql:host=".self::$_host.";dbname=".self::$_dbname.";charset=utf8", self::$_user, self::$_pwd);
        } catch(PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if(!self::$_bdd) {
            new ConnexionBD();
        }
        return (self::$_bdd);
    }
}