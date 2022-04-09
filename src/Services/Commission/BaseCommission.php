<?php

namespace App\Services\Commission;

class BaseCommission extends CommissionService
{
    public function get($amount, $currency, $countryCode, $rate): float
    {
        $commissionFee = $this->getCommissionFee($countryCode);

        $amount = $this->getAmountByCurrency($amount, $currency, $rate);

        $amount = $amount * $commissionFee;

        return $this->roundUpAmount($amount);
    }

    protected function isEuCountry($countryCode): string
    {
        $EuCountries = [
            'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FR', 'GR',
            'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PO', 'PT', 'RO',
            'SE', 'SI', 'SK',
        ];

        if (in_array($countryCode, $EuCountries)) {
            return true;
        }

        return false;
    }

    protected function getCommissionFee($countryCode): float
    {
        $catalog = [
            'default' => 0.02,
            'eu' => 0.01,
        ];

        $isEuCountry = $this->isEuCountry($countryCode);
        if ($isEuCountry) {
            return $catalog['eu'];
        }

        return $catalog['default'];
    }

    protected function getAmountByCurrency($amount, $currency, $rate): float
    {
        $baseCurrency = 'EUR';
        //I don't want change result of script but `$amntFixed` is probably undefined
        //I know that caused error - i want to get the same result
        $amountByCurrency = $amount;
        if ($currency != $baseCurrency or $rate > 0) {
            $amountByCurrency = $amount / $rate;
        }

        return $amountByCurrency;
    }

    protected function roundUpAmount($amount): float
    {
        $roundUpTo = 2;
        return round($amount, $roundUpTo);
    }
}
