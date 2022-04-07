<?php

namespace App\Services\Bin;

abstract class BinService
{
    abstract public function get($bin);

    abstract protected function request($bin);

    abstract protected function format($response);
}