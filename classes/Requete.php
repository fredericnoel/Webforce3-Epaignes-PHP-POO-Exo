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

    public function inserer(string $table, array $datas)
    {
        $colonnes = '(id';
        $valeurs = '(NULL';
        foreach ($datas as $key => $value) {
            $colonnes .= ', ' . $key;
            $valeurs .= ", :" . $key;
        }
        $colonnes .= ')';
        $valeurs .= ')';

        $sql = 'INSERT INTO ' . $table . ' ' . $colonnes . ' VALUES ' . $valeurs;
        $query = $this->pdo->prepare($sql);
        foreach ($datas as $key => $value) {
            $query->bindValue(":" . $key, $value, $this->getPDOType($value));
        }
        $result = $query->execute();
    }

    public function __destruct()
    {
        unset($this->pdo);
    }
}
