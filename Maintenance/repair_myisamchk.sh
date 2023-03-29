#inspecter
myisamchk -d -c -i -s
#Réparer :
myisamchk -a -r –e
#Optimiser, analyser :
myisamchk -a -d
#crontab -e
#0 3 * * * /var/www/Admibase_SIBD/Maintenance/repair_myisamchk.sh || logger -t repair_myisamchk "La tâche cron a échoué"