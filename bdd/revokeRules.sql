#1)
#Révoquer les droits d'administration sur la base de données pour l'utilisateur "admin_db":
REVOKE ALL PRIVILEGES ON gamedb.* FROM 'admin_db'@'localhost';

#2)
#Révoquer les droits de gestion des privilèges pour l'utilisateur "admin_privileges":
REVOKE GRANT OPTION ON *.* FROM 'admin_privileges'@'localhost';

#3)
#Révoquer les droits d'optimisation pour l'utilisateur "responsable_optimisation":
REVOKE INDEX ON gamedb.* FROM 'responsable_optimisation'@'localhost';

#4)
#Révoquer les droits de contrôle de processus pour l'utilisateur "tache_automatisee":
REVOKE PROCESS ON gamedb.tache_auto  FROM 'tache_automatisee'@'localhost';
REVOKE SHUTDOWN ON gamedb.tache_auto  FROM 'tache_automatisee'@'localhost';

#5)
#Révoquer les droits de développement pour l'utilisateur "developpeur":
REVOKE INSERT, UPDATE, DELETE ON gamedb.* FROM 'developpeur'@'localhost';

#6)
#Révoquer les droits de modération pour l'utilisateur "moderateur_communaute":
REVOKE UPDATE, DELETE ON gamedb.joueur FROM 'moderateur_communaute'@'localhost';

#7)
#Révoquer les droits de spécialiste métier pour l'utilisateur "specialiste_metier":
REVOKE SELECT, UPDATE ON gamedb.chevaux FROM 'specialiste_metier'@'localhost';

#8)
#Révoquer les droits d'administration de concours pour l'utilisateur "admin_concours":
REVOKE SELECT, INSERT, UPDATE, DELETE ON gamedb.concours FROM 'admin_concours'@'localhost';

#9)
#Révoquer les droits d'éditorialiste pour l'utilisateur "editorialiste":
REVOKE SELECT, INSERT, UPDATE, DELETE ON gamedb.journal_quotidien FROM 'editorialiste'@'localhost';

#10)
#Révoquer les droits de client pour l'utilisateur "client":
REVOKE SELECT ON gamedb.concours, gamedb.journal_quotidien FROM 'client'@'localhost';
REVOKE SELECT ON gamedb.concours, gamedb.concours FROM 'client'@'localhost';
