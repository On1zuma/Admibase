<?php
class Admin {
    private $host = "localhost"; // Nom d'hôte
    private $user = "root"; // Nom d'utilisateur
    private $password = ""; // Mot de passe
    private $database = "gamedb"; // Nom de la base de données

    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            die("La connexion à la base de données a échoué : " . mysqli_connect_error());
        }
    }

    public function query($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("La requête a échoué : " . mysqli_error($this->conn));
        }
        return $result;
    }

    public function close() {
        mysqli_close($this->conn);
    }

    public function connectUser($username, $userpassword) {
        $table = array();
        // Requête SQL pour sélectionner l'utilisateur et vérifier le mot de passe
        $sql = "SELECT User, Password FROM mysql.user WHERE User = '$username'";

        // Exécuter la requête SQL
        $result = mysqli_query($this->conn, $sql);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['Password'];
            if (password_verify($userpassword, $hash)) {
                // Fermer la connexion
                 mysqli_close($this->conn);
                 // Se connecter avec l'utilisateur
                 $this->user = $username;
                 $this->password = $userpassword;
                 $this->__construct();
                 $table = $this->rightUser($username);
                 echo "L'utilisateur $username est maintenant connecté";
                 return $table;
            } else {
                echo "L'utilisateur $username existe mais le mot de passe est incorrect !";
            }
        } else {
            echo "L'utilisateur $username n'existe pas !";
        }


    }

    public function rightUser($username) {
        $tableAndRights = array();
    
        switch ($username) {
            case 'admin_db':
                $tableAndRights['table'] = '*';
                $tableAndRights['access'] = ['ALL PRIVILEGES'];
                break;
            case 'admin_privileges':
                $tableAndRights['table'] = '*';
                $tableAndRights['access'] = ['GRANT OPTION'];
                break;
            case 'responsable_optimisation':
                $tableAndRights['table'] = '*';
                $tableAndRights['access'] = ['INDEX'];
                break;
            case 'tache_automatisee':
                $tableAndRights['table'] = 'taches_auto';
                $tableAndRights['access'] = ['RELOAD, SHUTDOWN, PROCESS'];
                break;
            case 'developpeur':
                $tableAndRights['table'] = '*';
                $tableAndRights['access'] = ['SELECT, INSERT, UPDATE, DELETE'];
                break;
            case 'moderateur_communaute':
                $tableAndRights['table'] = 'joueur';
                $tableAndRights['access'] = ['UPDATE, DELETE'];
                break;
            case 'specialiste_metier':
                $tableAndRights['table'] = 'chevaux';
                $tableAndRights['access'] = ['SELECT, UPDATE'];
                break;
            case 'admin_concours':
                $tableAndRights['table'] = 'concours';
                $tableAndRights['access'] = ['SELECT, INSERT, UPDATE, DELETE'];
                break;
            case 'editorialiste':
                $tableAndRights['table'] = 'journal_quotidien';
                $tableAndRights['access'] = ['SELECT, INSERT, UPDATE, DELETE'];
                break;
            case 'client':
                $tableAndRights['table'] = 'concours, journal_quotidien';
                $tableAndRights['access'] = ['SELECT'];
                break;
            default:
                $tableAndRights['table'] = null;
                $tableAndRights['access'] = null;
        }
        
        return $tableAndRights;
    }

}