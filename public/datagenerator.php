<?php

/*
$host = '127.0.0.1:3306';
$dbname = 'gamedb';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

$sql = "INSERT INTO '' ($columns) VALUES ($placeholders)";
$stmt = $this->bdd->prepare($sql);
$stmt->execute();
*/



// Connexion à la base de données
$host = 'localhost';
$dbname = 'gamedb';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Récupération des tables de la base de données
$tables = array();
$sql = "SHOW TABLES";
$stmt = $pdo->query($sql);
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    $tables[] = $row[0];
}

// Génération de données aléatoires pour chaque table
foreach ($tables as $table) {
    $stmt = $pdo->query("DESCRIBE $table");
    $columns = array();
    while($column = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $columns[] = $column;
    }
    if (count($columns) == 0 || count($columns) != $stmt->columnCount()) {
        // La table n'a pas de colonnes ou toutes les colonnes n'ont pas été récupérées
        continue;
    }
    // La table contient des colonnes valides, vous pouvez continuer à générer des données
    $increment = 1;
    $i = 0;
    for ($i = 0;$i<1000;$i++) {
        $insert_placeholder = array();
        $insert_values = array();
        $values = array();
        foreach ($columns as $column) {
            $type = getColumnType($pdo, $table, $column['Field']);
            if(str_contains($column['Field'], 'id')){     
                $values[] = $increment;
                $insert_placeholder[] = '?';
            }
            else{
                $values[] = '"'.generateRandomValue($type).'"';
                $insert_placeholder[] = '?';
            }
        }
        $insert_values[] = '(' . implode(',', $insert_placeholder) . ')';
        $increment = $increment + 1;
        /*var_dump(implode(',', array_column($columns, 'Field')));
        var_dump(implode(',', $insert_values));
        var_dump($values);*/
        /*$insert_sql = 'INSERT INTO ' . $table . ' (' . implode(',', array_column($columns, 'Field')) . ') VALUES ' . implode(',', $insert_values);
        var_dump($insert_sql);
        $stmt = $pdo->prepare($insert_sql);
        $stmt->execute($values);*/
        $ins = $pdo->query("INSERT INTO $table (".implode(',', array_column($columns, 'Field')).") VALUES (".implode(',', $values).")");
    }
    var_dump($table." importé");
}
var_dump("finish");

function getColumnType($pdo, $table, $column) {
    $sql = "SHOW COLUMNS FROM $table WHERE Field = '$column'";
    $stmt = $pdo->query($sql);
    $column = $stmt->fetch(PDO::FETCH_ASSOC);
    return $column['Type'];
}

function generateRandomValue($type) {
    switch ($type) {
        case str_contains($type, 'strint'):
        case str_contains($type, 'tinyint'):
        case str_contains($type, 'smallint'):
        case str_contains($type, 'mediumint'):
        case str_contains($type, 'bigint'):
        case str_contains($type, 'number'):
        return rand(0, 100000);
        case str_contains($type, 'float'):
        case str_contains($type, 'double'):
        case str_contains($type, 'decimal'):
        return rand(0, 10000) / 100;
        case str_contains($type, 'date'):
        return date("Y-m-d", rand(0, time()));
        case str_contains($type, 'datetime'):
        case str_contains($type, 'timestamp'):
        return date("Y-m-d H:i:s", rand(0, time()));
        case str_contains($type, 'time'):
        return date("H:i:s", rand(0, time()));
        case str_contains($type, 'char'):
        case str_contains($type, 'varchar'):
        case str_contains($type, 'text'):
        case str_contains($type, 'mediumtext'):
        case str_contains($type, 'longtext'):
        $length = rand(5, 20);
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $value = '';
        for ($i = 0; $i < $length; $i++) {
            $value .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $value;
        case str_contains($type, 'binary'):
        case str_contains($type, 'varbinary'):
        case str_contains($type, 'blob'):
        case str_contains($type, 'mediumblob'):
        case str_contains($type, 'longblob'):
        $length = rand(10, 100);
        $value = random_bytes($length);
        return $value;
    }
}


