<?php

require 'vendor/autoload.php';
$settings = new App\Services\Settings\Settings();
//I want to make the same result of initial script but don't want use @ i think try catch is good
$settings->disableWarnings();

//create app
$parserService = new App\Services\Parser\BaseParser($argv[1]);
$binService = new App\Services\Bin\BinSource();
$rateService = new App\Services\Rate\RateSource();
$commissionService = new App\Services\Commission\BaseCommission();
$viewService = new App\Services\View\BaseView();

App\Controller\CommissionController::start($parserService, $binService, $rateService, $commissionService, $viewService);