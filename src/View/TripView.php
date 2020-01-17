<?php
namespace App\View;

/**
 * Class TripView
 * @package Ap\View
 */
class TripView
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $measureInterval;

    /**
     * @var float
     */
    private $distance;

    /**
     * @var int
     */
    private $averageSpeed;

    /**
     * @param string $name
     * @param int $measureInterval
     * @param float $distance
     * @param int $averageSpeed
     */
    public function __construct(string $name, int $measureInterval, float $distance, int $averageSpeed)
    {
        $this->name = $name;
        $this->measureInterval = $measureInterval;
        $this->distance = $distance;
        $this->averageSpeed = $averageSpeed;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMeasureInterval(): int
    {
        return $this->measureInterval;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @return int
     */
    public function getAverageSpeed(): int
    {
        return $this->averageSpeed;
    }
}
