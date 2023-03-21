# SIBD - Data list

## To launch the project without WAMP :

- cd .\public\
- php -S localhost:8000
  Warning, database will not work

## BRANCH

- git pull // to update
- git switch branchName // to select the good branch
  Warning, please remember that you have to start from the main branch to select one of our branches.

## WAMP - XAMP - MAMP

- Set up your project inside the "www" folder.
- Launch Wamp, Xampp, or any other web server software you are using.
- Then use the URL "http://localhost/SIBD/public/index.php" to access the project.

## PUBLIC CONFIG

- Pour utiliser les nouvelles url (elles ne sont pas obligatoire) il faut créer un virtualhost:

  Clic Gauche sur l'icon de wamp => Vos VirtualHosts => Gestion VirtualHost

ou en allant ici : http://localhost/add_vhost.php

    Dans "Nom du Virtual Host" vous mettez un nom qui remplacera localhost (localhost fonctionnera toujours)

    Exemple : adminbase

    Dans "Chemin complet absolu du dossier VirtualHost" vous mettez le chemin à la racine de votre projet

    Exemple : C:\wamp64\www\SIBD\public\

    Vous cliquez sur "Démarrer la création ou la modification du VirtualHost"

- Enfin il faut redémarrer les DNS:

  Clic droit sur l'icon wamp => outils => Redémarrage DNS

- Pour tester (avec le nom du virtualhost choisi):

http://adminbase/

La page doit s'afficher.

## TO CREATE A NEW USER

To create a new user in MySQL, first access your MySQL database, then execute the following command:

- CREATE USER 'admin_db_test'@'localhost' IDENTIFIED BY 'adminsecurite';

This command creates a new user 'admin_db_test' with the password 'adminsecurite' and sets the user's access privileges to the local host.

Next, you can grant this user access to specific database(s) or table(s) within your MySQL database using the GRANT statement. For example, to grant 'admin_db_test' full privileges to the 'gamedb' database, you can execute the following command:

- GRANT ALL PRIVILEGES ON gamedb.\* TO 'admin_db_test'@'localhost';

This will give the user 'admin_db_test' full access to all tables and functions within the 'gamedb' database. Make sure to replace 'gamedb' with the name of the database you want to grant access to.

## CREER ET URILISER LA BDD
1) Dans phpmyadmin créer une nouvelle base de donnée nommée 'gamedb'.
2) Dans le menu en haut cliquer su 'Importer'.
3) Dans 'Choisir un fichier' mettre le fichier gamedb_structure.sql (disponible sur github dans le dossier bdd) puis cliquer sur 'Importer' en bas de la page (c'est long donc il faut attendre).
4) La structure est donc créer ! Maintenant il faut importer les données des tables.
5) Cliquer sur importer et dans 'Choisir un fichier' mettre le fichier sql de la première table puis cliquer sur 'Importer' en bas de la page (c'est long donc il faut attendre).
6) Répéter l'action pour les autres tables.


