#Écrire tables et fichiers de journalisation sur disque :
mysqladmin -u user -ppassword refresh
#surveillance des threads
mysqladmin -u user -ppassword processlist
 #Surveillance des variables
mysqladmin -u user -ppassword variables 
 #crontab -e
#0 1 * * * /usr/bin/php /chemin/vers/le/politique_surveillance.php