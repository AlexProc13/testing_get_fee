<?php

namespace Tests\Unit\Bin;

use Throwable;
use Faker\Factory;
use App\Services\Client\Client;
use App\Services\Bin\BinSource;
use PHPUnit\Framework\TestCase;
use App\Services\Settings\Settings;

class BinSourceTest extends TestCase
{
    public function testGetCountryByBin()
    {
        $faker = Factory::create();
        $countryCode = $faker->countryCode;
        $fakeResponse = [
            'scheme' => 'visa',
            'country' => [
                'alpha2' => $countryCode,
            ]
        ];

        $clint = $this->createMock(Client::class);
        $clint->method('get')
            ->willReturn(json_encode($fakeResponse));

        $service = new BinSource($clint);
        $givenCountry = $service->getCountryByBin(rand(1111, 9999));
        $expectedRate = $countryCode;
        $this->assertEquals($givenCountry, $expectedRate);
    }

    public function testErrorGetCountryByBin()
    {
        //without warning
        $settings = new Settings();
        $settings->disableWarnings();

        $faker = Factory::create();
        $fakeResponse = [];

        $clint = $this->createMock(Client::class);
        $clint->method('get')
            ->willReturn(json_encode($fakeResponse));

        $this->expectException(Throwable::class);

        $service = new BinSource($clint);
        $givenCountry = $service->getCountryByBin(rand(1111, 9999));
        $this->expectException(Throwable::class);
    }
}
