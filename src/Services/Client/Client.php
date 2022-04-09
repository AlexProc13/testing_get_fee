<?php

namespace App\Services\Client;

class Client
{
    public function get($url)
    {
        return file_get_contents($url);
    }
}
