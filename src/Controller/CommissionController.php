<?php

namespace App\Controller;

use App\Services\Bin\BinService;
use App\Services\View\ViewService;
use App\Services\Rate\RateService;
use App\Services\Parser\ParserService;
use App\Services\Commission\CommissionService;

class CommissionController
{
    static public function start(ParserService $parserService, BinService $binService, RateService $rateService, CommissionService $commissionService, ViewService $viewService): void
    {
        $content = $parserService->parse();
        foreach ($content as $item) {
            $countryByBin = $binService->get($item['bin']);

            if (is_null($countryByBin)) {
                die('error!');
            }

            $rate = $rateService->get($item['currency']);

            $commission = $commissionService->get($item, $countryByBin, $rate);

            $viewService->view($commission);
        }
    }
}