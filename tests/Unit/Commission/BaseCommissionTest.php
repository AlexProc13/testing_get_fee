<?php

namespace Tests\Unit\Commission;

use Faker\Factory;
use App\Services\Client\Client;
use PHPUnit\Framework\TestCase;
use App\Services\Commission\BaseCommission;

class BaseCommissionTest extends TestCase
{
    public function testGetCommissionCheckRound()
    {
        $faker = Factory::create();

        $service = new BaseCommission();
        $amount = $faker->randomFloat(4, 1, 1000);
        $countryCode = $faker->countryCode;
        $currency = $faker->currencyCode;
        $rate = $faker->randomFloat(4, 1, 3);
        $givenFee = $service->get($amount, $currency, $countryCode, $rate);
        $expectedNumberDecimalDigits = 2;
        $givenNumberDecimalDigits = strlen(substr(strrchr($givenFee, "."), 1));//todo

        $this->assertIsFloat($givenFee);
        $this->assertEquals($givenNumberDecimalDigits, $expectedNumberDecimalDigits);
    }
}