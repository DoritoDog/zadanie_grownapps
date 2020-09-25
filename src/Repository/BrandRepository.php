<?php

namespace App\Repository;

use App\Repository\Repository;
use App\Model\Brand;

class BrandRepository extends Repository
{
    function __construct($db)
    {
        parent::__construct($db);
    }

    public function load()
    {
        $sql = <<<SQL
SELECT 
    b.id, 
    b.name 
FROM brands b
SQL;

        $brands = $this->fetch($sql);
        return $this->rowsToModels($brands);
    }

    public function getStats()
    {
        $sql = <<<SQL
SELECT 
    b.name, 
    SUM(p.quantity) AS quantity, 
    SUM(p.reserved) AS reserved, 
    SUM(p.quantity * p.price) AS price_quantity, 
    SUM(p.reserved * p.price) AS price_reserved
FROM brands b
LEFT JOIN products p on b.id = p.brand_id
GROUP BY b.id
ORDER BY b.name
SQL;

        $brands = $this->fetch($sql);
        return $this->rowsToModels($brands);
    }

    function rowsToModels($rows)
    {
        $models = array();
        foreach ($rows as $modelData) {
            // Possible improvement: create a Factory class for brands and products to avoid repeating this code in ProductRepository
            // (not necessary yet because it is only a small function).
            $model = new Brand($modelData);
            array_push($models, $model);
        }
        return $models;
    }
}
