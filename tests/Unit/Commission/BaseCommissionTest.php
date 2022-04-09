<?php

namespace Tests\Unit\Commission;

use Throwable;
use Faker\Factory;
use PHPUnit\Framework\TestCase;
use App\Services\Commission\BaseCommission;

class BaseCommissionTest extends TestCase
{
    public function testGetCommissionCheck()
    {
        $faker = Factory::create();

        $service = new BaseCommission();
        $amount = $faker->randomFloat(4, 1, 1000);
        $countryCode = $faker->countryCode;
        $currency = $faker->currencyCode;
        $rate = $faker->randomFloat(4, 1, 3);
        $givenFee = $service->get($amount, $currency, $countryCode, $rate);

        $this->assertIsFloat($givenFee);
    }

    public function testErrorGetCommissionCheck()
    {
        $faker = Factory::create();

        $service = new BaseCommission();
        $amount = $faker->randomFloat(4, 1, 1000);
        $countryCode = $faker->word;//country not EUR
        $currency = $faker->currencyCode;
        $rate = 0;

        //Division by zero
        $this->expectException(Throwable::class);
        $service->get($amount, $currency, $countryCode, $rate);
    }
}
