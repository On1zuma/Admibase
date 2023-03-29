#Affiche que les processus mysql
ps aux | grep mysql
#lister tous les processus MySQL en cours
mysqladmin status
#affiche des informations telles que le nombre maximal de connexions simultanées, le nombre de connexions actives, le nombre de connexions en cours d'exécution et le nombre total de requêtes effectuées
mysqladmin -u tache_automatisee -p tacheAutosecurite extended-status | grep -E 'Max_used_connections|Threads_connected|Threads_running|Queries'
# montre les privilèges systèmes
SHOW PRIVILEGES

#crontab -e
#0 2 * * * /var/www/Admibase_SIBD/Maintenance/journalisation.sh || logger -t journalisation "La tâche cron a échoué"

#Ouvrir le fichier de configuration my.cnf :
#sudo nano /etc/mysql/my.cnf
#Ajouter les options de journalisation dans le fichier :
#log-bin=/var/log/mysql/mysql-bin.log
#log-error=/var/log/mysql/error.log
#log-isam=/var/log/mysql/isam.log
#log=/var/log/mysql/queries.log
#log-slow-queries=/var/log/mysql/slow-queries.log
#long_query_time=5