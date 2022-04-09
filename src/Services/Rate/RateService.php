<?php

namespace App\Services\Rate;

abstract class RateService
{
    protected object $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    abstract public function getRateByCountry($countryCode);

    abstract protected function request();

    abstract protected function format($response, $countryCode);
}
