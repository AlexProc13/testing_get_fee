<?php

namespace App\Services\Bin;

abstract class BinService
{
    abstract public function getCountryByBin($bin);

    abstract protected function request($bin);

    abstract protected function format($response);
}
