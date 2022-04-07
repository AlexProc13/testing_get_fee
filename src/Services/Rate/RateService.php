<?php

namespace App\Services\Rate;

abstract class RateService
{
    abstract public function get($countryCode);

    abstract protected function request();

    abstract protected function format($response, $countryCode);
}