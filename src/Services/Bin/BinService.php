<?php

namespace App\Services\Bin;

abstract class BinService
{
    protected object $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    abstract public function getCountryByBin($bin);

    abstract protected function request($bin);

    abstract protected function format($response);
}
