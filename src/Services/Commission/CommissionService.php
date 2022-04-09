<?php

namespace App\Services\Commission;

abstract class CommissionService
{
    abstract public function get($amount, $currency, $countryCode, $rate): float;
}
