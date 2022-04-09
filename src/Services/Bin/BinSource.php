<?php

namespace App\Services\Bin;

class BinSource extends BinService
{
    protected const URL = 'https://lookup.binlist.net/';

    public function getCountryByBin($bin)
    {
        $response = $this->request($bin);

        if (!$response) {
            return false;
        }

        return $this->format($response);
    }

    protected function request($bin)
    {
        $url = self::URL;
        $response = $this->client->get($url . $bin);
        return $response;
    }

    protected function format($response)
    {
        $data = json_decode($response);
        return $data->country->alpha2;
    }
}
