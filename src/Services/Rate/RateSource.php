<?php

namespace App\Services\Rate;

use Throwable;

class RateSource extends RateService
{
    public function get($countryCode)
    {
        $response = $this->request();

        if (!$response) {
            return false;
        }

        return $this->format($response, $countryCode);
    }

    protected function request()
    {
        try {
            //I want to make the same result of initial script but don't want use @ i think try catch is good
            $url = 'http://api.exchangeratesapi.io/latest?access_key=6ec20ccb4aa0f78802b452d9a8fc54ae';
            $response = file_get_contents($url);
            return $response;
        } catch (Throwable $exception) {
            return false;
        }
    }

    protected function format($response, $countryCode)
    {
        try {
            $data = json_decode($response, true);
            $rate = $data['rates'][$countryCode];
        } catch (Throwable $exception) {
            return null;
        }

        return $rate;
    }
}
