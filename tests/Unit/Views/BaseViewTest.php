<?php

namespace Tests\Unit\Views;

use Faker\Factory;
use App\Services\View\BaseView;
use PHPUnit\Framework\TestCase;

class BaseViewTest extends TestCase
{
    public function testUserCanSeeOutPut()
    {
        $faker = Factory::create();

        $someResult = $faker->randomFloat;
        $lineBreak = "\n";
        $expectedResult = $someResult . $lineBreak;

        $service = new BaseView();
        $service->view($someResult);
        $this->expectOutputString($expectedResult);
    }
}
