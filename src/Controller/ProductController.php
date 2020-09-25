<?php

namespace App\Controller;

use App\Log;
use App\Model\Brand;
use App\Repository\ProductRepository;
use App\PdoDB;

class ProductController extends AbstractController
{
    protected function getName()
    {
        return 'product';
    }

    protected function getData()
    {
        $name = (empty($_GET['name'])) ? '' : $_GET['name'];
        $brand = (empty($_GET['brand'])) ? '' : $_GET['brand'];
        $order = (empty($_GET['order'])) ? 'id' : $_GET['order'];
        $limit = (empty($_GET['limit'])) ? 10 : $_GET['limit'];

        Log::info(sprintf('Rendering products action.'), $_GET);

        $db = new PdoDB();

        $brandModel = new Brand($db);
        $brands = $brandModel->load();

        $productRepository = new ProductRepository($db);
        $products = $productRepository->load($name, $brand, $order, 'ASC', $limit);
        
        return [
            'title' => 'Products',
            'products' => $products,
            'brands' => $brands,
        ];
    }
}
