<?php
namespace App\Utils;

/**
 * Class AverageSpeedCalculator
 * @package App\Utils
 */
class AverageSpeedCalculator
{
    /**
     * @param int $measureInterval
     * @param int[] $distances
     * @return int
     */
    public function calculate(int $measureInterval, array $distances): int
    {
        $averageSpeed = 0;
        for ($i = 1; $i < count($distances); $i++) {
            $speed = floor(3600 * ($distances[$i] - $distances[$i - 1]) / $measureInterval);
            $averageSpeed = max($averageSpeed, $speed);
        }
        return $averageSpeed;
    }
}
