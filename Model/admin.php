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
                 echo "L'utilisateur $username est maintenant connecté";

            } else {
                echo "L'utilisateur $username existe mais le mot de passe est incorrect !";
            }
        } else {
            echo "L'utilisateur $username n'existe pas !";
        }

    }
}