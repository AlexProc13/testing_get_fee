<?php

namespace App\Controller;

use Exception;
use App\Services\Bin\BinService;
use App\Services\View\ViewService;
use App\Services\Rate\RateService;
use App\Services\Parser\ParserService;
use App\Services\Commission\CommissionService;

class CommissionController
{
    public static function start(ParserService $parserService, BinService $binService, RateService $rateService, CommissionService $commissionService, ViewService $viewService): void
    {
        $content = $parserService->parse();
        foreach ($content as $item) {
            $countryCode = $binService->getCountryByBin($item['bin']);

            if (is_null($countryCode)) {
                throw new Exception('bin service is not working.');
            }

            $rate = $rateService->getRateByCountry($item['currency']);

            $commission = $commissionService->get($item['amount'], $item['currency'], $countryCode, $rate);

            $viewService->view($commission);
        }
    }
}
