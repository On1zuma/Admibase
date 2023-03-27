#inspecter
myisamchk -d -c -i -s
#Réparer :
myisamchk -a -r –e
#Optimiser, analyser :
myisamchk -a -d
#crontab -e
#0 3 * * * /usr/bin/php /chemin/vers/le/SIBD/Maintenance/repair_myisamchk.php || logger -t repair_myisamchk "La tâche cron a échoué"