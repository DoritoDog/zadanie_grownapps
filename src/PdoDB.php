<?php

namespace App;

use \PDO;
use App\iDB;

final class PdoDB implements iDB
{
    /*
     * readonly @var PDO
     */
    private $pdo;

    function __construct()
    {
        $this->pdo = new PDO(
            "mysql:host=" . _DB_SERVER_ . ';port=3306;dbname=' . _DB_NAME_,
            _DB_USER_,
            _DB_PASSWD_
        );
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);
        $this->pdo->query('SET NAMES utf8');
        $this->pdo->query('SET CHARACTER SET utf8');
    }

    public function get_pdo()
    {
        return $this->pdo;
    }

    public function queryAndFetch($statement)
    {
        return $this->pdo->query($statement)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function queryAndFetchPrepared($statement, $parameters)
    {
        $stmt = $this->pdo->prepare($statement);
        $stmt->execute($parameters);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}
