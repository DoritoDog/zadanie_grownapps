<?php

namespace App;

use \PDO;

final class DB
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
}
