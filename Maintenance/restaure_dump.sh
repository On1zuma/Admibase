mysql -u tache_automatisee -ptacheAutosecurite -e "source /patch/backup-file.sql" game_db

#crontab -e
#30 3 * * * /chemin/vers/le/SIBD/Maintenance/restaure_dump.sh || logger -t restaure_dump "La tâche cron a échoué"
