<?php

namespace App\Services\Rate;

use Throwable;

class RateSource extends RateService
{
    protected const URL = 'http://api.exchangeratesapi.io/latest';

    public function getRateByCountry($countryCode)
    {
        $response = $this->request();

        if (!$response) {
            return false;
        }

        return $this->format($response, $countryCode);
    }

    public function request()
    {
        try {
            //I want to make the same result of initial script but don't want use @ i think try catch is good
            $url = $this->addAuth(self::URL);
            $response = $this->client->get($url);
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

    protected function addAuth($link)
    {
        //todo
        $token = $_ENV['BASE_RATE_KEY'];
        return $link . "?access_key={$token}";
    }
}
