<?php

namespace App\Repository;

use App\Repository\Repository;
use App\Model\Product;

class ProductRepository extends Repository
{
    function __construct($db)
    {
        parent::__construct($db);
    }

    public function load($name = '', $brandId = '', $order = 'id', $direction = 'ASC', $limit = 10)
    {
        $sql = <<<SQL
SELECT p.*, b.name AS brand FROM products p
JOIN brands b on p.brand_id = b.id
SQL;

        $parameters = [];
        if ('' !== $name || '' !== $brandId) {
            $where = [];
            if ('' !== $name) {
                $where[] = "p.name LIKE :name";
                $parameters[':name'] = "%$name%";
            }

            if ('' !== $brandId) {
                $where[] = "b.id = :brandId";
                $parameters[':brandId'] = $brandId;
            }

            $sql .= " WHERE " . implode(" AND ", $where);
        }


        $sql = $this->addCommonParts($sql, $order, $direction, $limit);
        // Check if there are parameters and if so, use a prepared statement.
        $products = (!is_null($parameters) && array_count_values($parameters) > 0) ? $this->fetch_prepared($sql, $parameters) : $this->fetch($sql);

        $productModels = array();
        foreach ($products as $productData) {
            $productModel = new Product($productData);
            array_push($productModels, $productModel);
        }

        return $productModels;
    }
}
