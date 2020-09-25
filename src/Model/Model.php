<?php

namespace App\Model;

use App\DB;

abstract class Model
{
    /**
     * @var DB
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
        $stmt = $this->db->get_pdo()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
