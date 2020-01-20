<?php
namespace App\Tests\Utils;

use App\Utils\AverageSpeedCalculator;
use PHPUnit\Framework\TestCase;

class AverageSpeedCalculatorTest extends TestCase
{
    public function testCalculate()
    {
        $distances = [0.0, 0.19, 0.5, 0.75, 1.0, 1.25,  1.5, 1.75, 2.0, 2.25];
        $measureInterval = 15;

        $calculator = new AverageSpeedCalculator();
        $result = $calculator->calculate($measureInterval, $distances);

        $this->assertEquals(74, $result);
    }
}