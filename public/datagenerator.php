<?php


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

$table = 'blessures_chevaux';

$stmt = $pdo->query("SELECT MAX(id) AS id FROM $table");

$maxid;

while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $maxid = $data['id'];
}



$noms = ['Caramele','Noisette','Pomme','Apple','Feuille','Dark Horse','Houle'];
$id = $maxid+1;
$chevaux_id = $maxid+1;

if(isset($_GET['generation'])){
    echo 'Génération en cours, attendez quelques minutes...';
    sleep(1);
    for($i=0;$i<500000;$i++){
        $rand = rand(0,count($noms)-1);
        $ins = $pdo->query("INSERT INTO $table (nom,id,chevaux_id) VALUES ('".$noms[$rand]."','".$id."','".$chevaux_id."')");
        $id = $id + 1;
        $chevaux_id = $chevaux_id + 1;
    }
}

else{
    echo "Cliquer pour générer 500 000 lignes supplémentaires (c'est très long)";
    echo '<form action="" method="GET"><input type="hidden" name="generation"><button type="submit">Generer</form>';
}

