<?php

namespace App\Controller;

use App\Repository\BrandRepository;
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
        $brandRepository = new BrandRepository($db);

        return [
            'title' => 'Stats',
            'brands' => $brandRepository->getStats(),
        ];
    }
}
