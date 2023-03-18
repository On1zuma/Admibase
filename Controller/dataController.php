<?php

class DataController
{
    public function __construct()
    {
    }

    public function listOurTables()
    {
        $table_name = $_SESSION['id']['table'];
        $bdd = new PDO('mysql:host=localhost;dbname=gamedb;charset=utf8;', 'root', '');

        if ($table_name != "*") {
            $tables = explode(", ", $table_name);
        } else {
            $stmt = $bdd->prepare("SHOW TABLES");
            $stmt->execute();
            return $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
    }
}
