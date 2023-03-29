<?php

class Admin
{
    private $host = "localhost"; // Nom d'hôte
    private $user = "root"; // Nom d'utilisateur
    private $password = ""; // Mot de passe
    private $database = "gamedb"; // Nom de la base de données

    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            die("La connexion à la base de données a échoué : " . mysqli_connect_error());
        }
    }

    public function query($sql)
    {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("La requête a échoué : " . mysqli_error($this->conn));
        }
        return $result;
    }

    public function close()
    {
        mysqli_close($this->conn);
    }

    public function connectUser($username, $userpassword)
    {
        $table = array();
        // Requête SQL pour sélectionner l'utilisateur et vérifier le mot de passe
        $sql = "SELECT User, authentication_string FROM mysql.user WHERE User = '$username'";

        // Exécuter la requête SQL
        $result = mysqli_query($this->conn, $sql);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['authentication_string'];
            if ($userpassword != '' && $hash != '') {
                // Se connecter avec l'utilisateur
                $this->user = $username;
                $this->password = $userpassword;
                // Store CSRF token in user's session
                $csrf_token = bin2hex(random_bytes(32));

                @mysqli_connect($this->host, $this->user, $this->password, $this->database);

                if (!mysqli_connect_errno()) {
                    $table = $this->rightUser($username);
                    $_SESSION['csrf_token'] = $csrf_token;
                    $_SESSION['username'] = $this->user;
                    $_SESSION['password'] = $this->password;
                    $_SESSION['id'] = $table;
                    echo "L'utilisateur $username est maintenant connecté";
                    header("Location: list-table.php");
                } else {
                    echo "Mauvais mot de passe";
                }
            }
        } else {
            echo "L'utilisateur $username n'existe pas !";
        }
    }


    public function rightUser($username)
    {
        $tableAndRights = array();

        switch ($username) {
            case 'admin_db':
                $tableAndRights['table'] = '*';
                $tableAndRights['access'] = ['ALL PRIVILEGES'];
                break;
            case 'admin_db_test':
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
