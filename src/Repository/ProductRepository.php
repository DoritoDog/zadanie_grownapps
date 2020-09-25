<?php

namespace App\Repository;

use App\Repository\Repository;
use App\Model\Product;
use App\QueryBuilder;

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

        // Order and limit the data.
        $queryBuilder = new QueryBuilder($sql);
        $queryBuilder->order($order, $direction, $parameters);
        $queryBuilder->limit($limit);
        $sql = $queryBuilder->get_sql();

        $products = $this->fetch_prepared($sql, $parameters);

        // Create Product classes from the database rows.
        $productModels = array();
        foreach ($products as $productData) {
            $productModel = new Product($productData);
            array_push($productModels, $productModel);
        }

        return $productModels;
    }
}
