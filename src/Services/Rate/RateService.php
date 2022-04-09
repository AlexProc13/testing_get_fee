<?php

namespace App\Services\Rate;

abstract class RateService
{
    abstract public function getRateByCurrency($countryCode);

    abstract protected function request();

    abstract protected function format($response, $countryCode);
}
