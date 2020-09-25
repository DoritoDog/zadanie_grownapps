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

    protected function addCommonParts($sql, $order = 'id', $direction = 'ASC', $limit = 10)
    {
        if ("" !== $order) {
            $sql .= " ORDER BY $order $direction";
        }

        $sql .= " LIMIT $limit";

        return $sql;
    }

    protected function fetch($sql)
    {
        return $this->db->queryAndFetch($sql);
    }
}
