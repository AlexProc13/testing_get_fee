<?php

namespace App\Services\Bin;

class BinSource extends BinService
{
    public function get($bin)
    {
        $response = $this->request($bin);

        if (!$response) {
            return false;
        }

        return $this->format($response);
    }

    protected function request($bin)
    {
        $url = 'https://lookup.binlist.net/';
        $response = file_get_contents($url . $bin);
        return $response;
    }

    protected function format($response)
    {
        $data = json_decode($response);
        return $data->country->alpha2;
    }
}
