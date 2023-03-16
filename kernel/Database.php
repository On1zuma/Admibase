<?php


require_once __DIR__ . '/../vendor/autoload.php';


final class Database
{
    private string $dsn;
    private string $user;
    private string $password;

    public function __construct()
    {
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        //data from the .env
        $config = [
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
            ]
        ];

        $this->dsn = $config['db']['dsn'] ?? '';
        $this->user = $config['db']['user'] ?? '';
        $this->password = $config['db']['password'] ?? '';
    }

    //GET - exemple : $users = $db->queryGetAction(1, ['pseudo', 'autre'], 'utilisateur');
    public function queryGetAction(int $id, array $params, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
            // $S_base = new PDO('mysql:host=localhost:3306; dbname=tesla_app', 'root', '');
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $query = '';
        $nb = count($params);
        $int = 0;
        if (count($params) === 1) {
            $query = $params[0];
        } else {
            foreach ($params as $param) {
                if ($int < $nb-1) {
                    $query .= $param . ', ';
                } else {
                    $query .= $param;
                }
                $int++;
            }
        }

        /*$id = 1;
        $param = "username";*/

        $A_selection = $S_base->query("SELECT " . $query . " FROM ". $table ." WHERE id = '" . $id . "'");

        while ($data = $A_selection->fetch(PDO::FETCH_ASSOC)) {
            return $data;
        }
    }

    //UPDATE - exemple : return $db->queryUpdateAction(1, [['pseudo' => 'Toto'], ['autre' => 'Mimi']], 'utilisateur');
    public function queryUpdateAction(int $id, array $params, string $table)
    {
        try {
            $S_base = new PDO($this->dsn, $this->user, $this->password);
            // $S_base = new PDO('mysql:host=localhost:3306; dbname=tesla_app', 'root', '');
        } catch (exception $S_e) {
            die('Erreur ' . $S_e->getMessage());
        }
        $S_base->exec("SET CHARACTER SET utf8");

        $query = '';
        $nb = count($params);
        $int = 0;
        if (count($params) === 1) {
            $query = $params[0];
        } else {
            foreach ($params as $param) {
                foreach ($param as $key => $value) {
                    if ($int < $nb-1) {
                        $query .= $key . "='". $value. "',";
                    } else {
                        $query .= $key . "='". $value;
                    }
                    $int++;
                }
            }
        }

        $S_update = $S_base->query("UPDATE ". $table ." SET " . $query . "' WHERE id = '" . $id . "'");

        echo 'Success';
    }

    //CREATE - exemple :
    public function queryCreateAction()
    {
    }
}
