<?php

namespace App\Controller;

use App\Model\Brand;
use App\DB;

class StatsController extends AbstractController
{
    protected function getName()
    {
        return 'stats';
    }

    protected function getData()
    {
        $db = new DB();
        $brandModel = new Brand($db);

        return [
            'title' => 'Stats',
            'brands' => $brandModel->getStats(),
        ];
    }
}
