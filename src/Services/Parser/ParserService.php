<?php

namespace App\Services\Parser;

abstract class ParserService
{
    protected $fileName = null;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    abstract public function parse(): array;
}