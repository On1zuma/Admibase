<?php


class DbMigration
{
    /**
     * @var \PDO
     */
    public \PDO $pdo;
    // public $Root =;
    /**
     * Database constructor
     */
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

        $dsn = $config['db']['dsn'] ?? '';
        $user = $config['db']['user'] ?? '';
        $password = $config['db']['password'] ?? '';

        $this->pdo = new \PDO($dsn, $user, $password);
        //if something goes wrong :
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * We create migration table to save previous migration
     * We check if a migration has been made, we get all the migration from the migration folder
     * Finaly we check the difference with array_diff to apply only the new migration (with array_diff()) on the array $newMigrations = [];
     */
    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        // getcwd() = gives the full path of the current directory as a string
        $files = scandir(getcwd().'/migrations');
        $toAppliedMigrations = array_diff($files, $appliedMigrations);

        foreach ($toAppliedMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }
            require_once  getcwd().'/migrations/'.$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            echo " ".PHP_EOL;
            $this->log("Applying migration $migration ") . PHP_EOL;
            $instance->up();
            $this->log("Applied migration $migration ") . PHP_EOL;
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("All migrations are applied") . PHP_EOL;
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY, 
            migration VARCHAR(255),
            create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    /**
     * INSERT DATA INSIDE THE DB
     */
    public function saveMigrations(array $migrations)
    {
        //convert FROM "m0001_intial.php" TO " "('m0001_intial.php')" FOR THE DB
        $str =implode(",", array_map(fn ($m) => "('$m')", $migrations));

        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES
            $str
            ");
        $statement->execute();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    // date before the message
    protected function log($message)
    {
        echo '['.date('Y-m-d H:i:s').'] - '. $message . PHP_EOL;
    }
}
