<?php

namespace App\Services\Parser;

class BaseParser extends ParserService
{
    public function parse(): array
    {
        $fileName = $this->fileName;
        $result = [];
        foreach (explode("\n", file_get_contents($fileName)) as $row) {
            $item = json_decode($row, true);
            $result[] = $item;
        }
        return $result;
    }
}