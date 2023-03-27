#Écrire tables et fichiers de journalisation sur disque :
mysqladmin -u tache_automatisee -p tacheAutosecurite refresh
#surveillance des threads
mysqladmin -u tache_automatisee -p tacheAutosecurite processlist
 #Surveillance des variables
mysqladmin -u tache_automatisee -p tacheAutosecurite variables 
 #crontab -e
#0 1 * * * /usr/bin/php /chemin/vers/le/SIBD/Maintenance/politique_surveillance.php || logger -t politique_surveillance "La tâche cron a échoué"