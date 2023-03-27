<?php

// Configuration de la base de données
$host = 'localhost';
$user = 'tache_automatisee';
$password = 'tacheAutosecurite';
$dbname = 'gamedb';

// Connexion à la base de données
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

// Pour chaque table
foreach ($tables as $table) {
  // Restaurer les données
  $pdo->query("LOAD DATA INFILE '/homme/mysqlbackup/backup.sql' INTO TABLE $table;")->execute();
}
#crontab -e
#0 3 * * * /usr/bin/php /chemin/vers/le/restaure_mysql.php || logger -t restaure_mysql "La tâche cron a échoué"