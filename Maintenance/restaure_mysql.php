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
  $pdo->query("LOAD DATA INFILE '/home/mysqlbackup/$table.sql' INTO TABLE $table;")->execute();
}
#crontab -e
#30 3 * * * /usr/bin/php /var/www/Admibase_SIBD/Maintenance/restaure_mysql.php || logger -t restaure_mysql "La tâche cron a échoué"
