<?php

namespace App;

class QueryBuilder
{
    /*
     * @var string
     */
    private $sql;

    function __construct($sql)
    {
        $this->sql = $sql;
    }

    public function order($order, $direction, $parameters)
    {
        // The direction can only be 'ASC' or 'DESC.
        if ("" !== $order) {
            if ($direction === 'ASC')
                $sql .= " ORDER BY :order ASC";
            if ($direction === 'DESC')
                $sql .= " ORDER BY :order DESC";
        }
        $parameters[':order'] = $order;
    }

    public function limit($limit)
    {
        $this->sql .= filter_var($limit, FILTER_VALIDATE_INT) ? " LIMIT " . $limit : "LIMIT 10";
    }

    public function get_sql()
    {
        return $this->sql;
    }
}
