<?php

namespace App\Services\Commission;

class BaseCommission extends CommissionService
{
    public function get($item, $countryByBin, $rate)
    {
        dd($item, $countryByBin, $rate);
        $isEuCountry = $this->isEuCountry($countryByBin);
        dd($isEuCountry);
//
//        if ($value[2] == 'EUR' or $rate == 0) {
//            $amntFixed = $value[1];
//        }
//        if ($value[2] != 'EUR' or $rate > 0) {
//            $amntFixed = $value[1] / $rate;
//        }
//
//        echo $amntFixed * ($isEu == 'yes' ? 0.01 : 0.02);
    }

    protected function isEuCountry($countryCode)
    {
        $EuCountries = ['AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FR', 'GR',
            'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PO', 'PT', 'RO', 'SE', 'SI', 'SK'];

        if (in_array($countryCode, $EuCountries)) {
            return true;
        }

        return false;
    }
}