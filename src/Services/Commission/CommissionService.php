<?php

namespace App\Services\Commission;

abstract class CommissionService
{
    abstract public function get($item, $countryByBin, $rate) :float;
}