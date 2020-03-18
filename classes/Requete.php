<?php

class Requete
{
    private $pdo;
    private $host = 'mysql:host=localhost;port=3306;dbname=toto';
    private $login = 'root';
    private $password = '';

    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->host, $this->login, $this->password);
        } catch (PDOException $e) {
            Log::logWrite($e->getMessage());
        }
    }

    public function inserer(string $table, array $valeurs)
    {
        $sql = "INSERT INTO $table VALUES";

        foreach ($valeurs as $key => $value) {
            $sql .= $key;
            if ($key !== count($value) - 1) {
                $sql .= ", ";
            }
        }


        // Test
        die($sql);
    }

    public function __destruct()
    {
        unset($this->pdo);
    }
}
