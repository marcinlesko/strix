<?php declare(strict_types=1);
namespace App\ViewFactory;

use App\Entity\Trip;
use App\Utils\AverageSpeedCalculator;
use App\View\TripView;

/**
 * Class TripViewFactory
 * @package App\ViewFactory
 */
class TripViewFactory
{
    /**
     * @var AverageSpeedCalculator
     */
    private $averageSpeedCalculator;

    /**
     * TripViewFactory constructor.
     * @param AverageSpeedCalculator $averageSpeedCalculator
     */
    public function __construct(AverageSpeedCalculator $averageSpeedCalculator)
    {
        $this->averageSpeedCalculator = $averageSpeedCalculator;
    }

    /**
     * @param Trip $trip
     * @return TripView
     */
    public function create(Trip $trip): TripView
    {
        $name = $trip->getName();
        $measureInterval = $trip->getMeasureInterval();
        $measureDistances = $trip->getMeasuresDistances();
        $averageSpeed = $this->averageSpeedCalculator->calculate($measureInterval, $measureDistances);

        return new TripView($name, $measureInterval, max($measureDistances), $averageSpeed);
    }
}
