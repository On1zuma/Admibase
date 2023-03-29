--Pour créer les utilisateurs MySQL suivants, vous pouvez utiliser la commande suivante dans la ligne de commande MySQL :

--1)
--Administrateur de la base de données ayant tous les droits sur la base de données :
CREATE USER 'admin_db'@'localhost' IDENTIFIED BY 'adminsecurite';
GRANT ALL PRIVILEGES ON gamedb.* TO 'admin_db'@'localhost';


--2)
--Administrateur de privilèges n’ayant pas accès aux tables mais pouvant gérer les permissions de l’ensemble des utilisateurs :
CREATE USER 'admin_privileges'@'localhost' IDENTIFIED BY 'adminsecurite';
GRANT USAGE WITH GRANT OPTION ON *.* TO 'admin_privileges'@'localhost';

--3)
--Responsable optimisation pouvant gérer l’ensemble des index :
CREATE USER 'responsable_optimisation'@'localhost' IDENTIFIED BY 'responsablesecurite';
GRANT INDEX ON gamedb.* TO 'responsable_optimisation'@'localhost';

--4)
--Tâche automatisée pouvant lancer, arrêter ou recharger le serveur MySQL et contrôler les processus utilisateurs :
CREATE USER 'tache_automatisee'@'localhost' IDENTIFIED BY 'tacheAutosecurite';
GRANT RELOAD, SHUTDOWN, PROCESS ON gamebd.taches_auto TO 'tache_automatisee'@'localhost';

--5)
--Développeur pouvant visionner, insérer/modifier et supprimer l’ensemble de l’extension (c.-à-d. des données) de la base de données :
CREATE USER 'developpeur'@'localhost' IDENTIFIED BY 'developpeursecurite';
GRANT SELECT, INSERT, UPDATE, DELETE ON gamedb.* TO 'developpeur'@'localhost';

--6)
--Modérateur de communauté pouvant modifier ou supprimer l’ensemble des données « joueur » :
CREATE USER 'moderateur_communaute'@'localhost' IDENTIFIED BY 'moderateurCommunautesecurite';
GRANT UPDATE, DELETE ON gamedb.joueur TO 'moderateur_communaute'@'localhost';


--7)
--Spécialiste métier pouvant visualiser et modifier l’ensemble des données « cheval » :
CREATE USER 'specialiste_metier'@'localhost' IDENTIFIED BY 'specialisteMetiersecurite';
GRANT SELECT, UPDATE ON gamedb.chevaux TO 'specialiste_metier'@'localhost';


--8)
--Administrateur de concours pouvant visionner, insérer/modifier et supprimer l’ensemble des données « concours » :
CREATE USER 'admin_concours'@'localhost' IDENTIFIED BY 'adminConcoursecurite';
GRANT SELECT, INSERT, UPDATE, DELETE ON gamedb.concours TO 'admin_concours'@'localhost';


--9)
--Éditorialiste pouvant visionner, insérer/modifier et supprimer l’ensemble des données « journal » :
CREATE USER 'editorialiste'@'localhost' IDENTIFIED BY 'editorialistesecurite';
GRANT SELECT, INSERT, UPDATE, DELETE ON gamedb.journal_quotidien TO 'editorialiste'@'localhost';


--10)
--Client pouvant visionner les données « concours » et « journal » :
CREATE USER 'client'@'localhost' IDENTIFIED BY 'clientsecurite';
GRANT SELECT ON gamedb.concours, gamedb.Concours TO 'client'@'localhost';
GRANT SELECT ON gamedb.concours, gamedb.journal_quotidien TO 'client'@'localhost';
