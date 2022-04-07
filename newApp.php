<?php

require 'vendor/autoload.php';

$parserService = new App\Services\Parser\BaseParser($argv[1]);
$binService = new App\Services\Bin\BinSource();
$rateService = new App\Services\Rate\RateSource();
$commissionService = new App\Services\Commission\BaseCommission();
$viewService = new App\Services\View\BaseView();

App\Controller\CommissionController::start($parserService, $binService, $rateService, $commissionService, $viewService);