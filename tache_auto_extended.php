<?php

// Configuration de la base de données
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'gamedb';

// Connexion à la base de données
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

// Récupération des tables MyISAM
$tables = $pdo->query("SHOW TABLES WHERE Engine = 'MyISAM'")->fetchAll(PDO::FETCH_COLUMN);

// Pour chaque table
foreach ($tables as $table) {
  // Inspection
  $pdo->query("CHECK TABLE $table EXTENDED")->execute();
  $pdo->query("REPAIR TABLE $table")->execute();
  
  // Optimisation
  $pdo->query("OPTIMIZE TABLE $table")->execute();
  
  // Défragmentation
  $pdo->query("ANALYZE TABLE $table")->execute();
}
#crontab -e
#0 0 1 * * /usr/bin/php /chemin/vers/le/tache_auto_extented.php || logger -t tache_auto_extented "La tâche cron a échoué"