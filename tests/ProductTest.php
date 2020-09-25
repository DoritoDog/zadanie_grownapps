<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Product;
use App\iDB;

class DB implements iDB
{
    public function queryAndFetch($statement)
    {
        return null;
    }
}

class ProductTest extends TestCase
{
    public function testConnection()
    {
        // Arrange.
        $db = new DB();
        $product = new Product($db);

        // Act.
        $products = $product->load();

        // Assert.
        $this->assertTrue(count($products) > 0);
    }
}
