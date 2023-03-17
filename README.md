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
