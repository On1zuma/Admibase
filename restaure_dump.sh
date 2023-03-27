mysql -u tache_automatisee -ptacheAutosecurite -e "source /patch/backup-file.sql" game_db

#crontab -e
#0 3 * * * /usr/bin/php /chemin/vers/le/restaure_dump.php || logger -t restaure_dump "La tâche cron a échoué"
