<?php

namespace App\Repository;

use App\PdoDB;

abstract class Repository
{
    /**
     * @var iDB
     */
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    protected function fetch($sql)
    {
        return $this->db->queryAndFetch($sql);
    }

    protected function fetch_prepared($sql, $parameters)
    {
        return $this->db->queryAndFetchPrepared($sql, $parameters);
    }
}
