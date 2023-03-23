![admibasecodebanner](https://user-images.githubusercontent.com/23278834/227152693-709d81a2-9e83-4417-90dc-6666e7f40b0c.png)


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

## CREATE AND USE THE DATABASE
1) In phpMyAdmin, create a new database named 'gamedb'.
2) In the top menu, click on 'Import'.
3) In 'Choose a file', select the gamedb_structure.sql file (available on GitHub in the bdd folder), then click on 'Import' at the bottom of the page (this may take some time).
4) The structure is now created! Next, you need to import the data for the tables (the data can be found in bdd/Donnée_v2.zip, so you need to unzip it first).
5) Click on 'Import' and in 'Choose a file', select the SQL file for the first table, then click on 'Import' at the bottom of the page (this may take some time).
6) Repeat the process for the other tables.


