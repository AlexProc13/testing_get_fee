<?php

namespace Tests\Unit\Rate;

use Faker\Factory;
use App\Services\Client\Client;
use App\Services\Rate\RateSource;
use PHPUnit\Framework\TestCase;

class RateSourceTest extends TestCase
{
    public function testGetRateByCurrency()
    {
        $faker = Factory::create();
        $currencyRates = [];
        foreach (range(0, mt_rand(5, 10)) as $item) {
            $currencyRates[$faker->currencyCode] = $faker->randomFloat();
        }

        $fakeResponse = [
            'status' => true,
            'rates' => $currencyRates
        ];

        $clint = $this->createMock(Client::class);
        $clint->method('get')
            ->willReturn(json_encode($fakeResponse));

        $randCurrency = array_rand($fakeResponse['rates'], 1);
        $service = new RateSource($clint);
        $givenRate = $service->getRateByCountry($randCurrency);
        $expectedRate = $fakeResponse['rates'][$randCurrency];
        $this->assertEquals($givenRate, $expectedRate);
    }

    public function testErrorGetRateByCurrency()
    {
        $faker = Factory::create();
        $fakeResponse = [
            'status' => false,
            'error' => []
        ];

        $clint = $this->createMock(Client::class);
        $clint->method('get')
            ->willReturn(json_encode($fakeResponse));

        $service = new RateSource($clint);
        $givenRate = $service->getRateByCountry($faker->currencyCode);
        $expectedRate = null;
        $this->assertEquals($givenRate, $expectedRate);
    }
}
