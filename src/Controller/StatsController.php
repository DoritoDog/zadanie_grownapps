<?php

namespace App\Controller;

use App\Model\Brand;
use App\PdoDB;

class StatsController extends AbstractController
{
    protected function getName()
    {
        return 'stats';
    }

    protected function getData()
    {
        $db = new PdoDB();
        $brandModel = new Brand($db);

        return [
            'title' => 'Stats',
            'brands' => $brandModel->getStats(),
        ];
    }
}
