<?php declare(strict_types=1);
namespace App\ViewRepository;

use App\Entity\Trip;
use App\Repository\TripRepository;
use App\Utils\AverageSpeedCalculator;
use App\View\TripView;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class Trips
 * @package App\ViewRepository
 */
class Trips
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var AverageSpeedCalculator
     */
    private $averageSpeedCalculator;

    /**
     * @param EntityManagerInterface $entityManager
     * @param AverageSpeedCalculator $averageSpeedCalculator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        AverageSpeedCalculator $averageSpeedCalculator
    ) {
        $this->entityManager = $entityManager;
        $this->averageSpeedCalculator = $averageSpeedCalculator;
    }

    /**
     * @return TripView[]
     */
    public function getAll()
    {
        $trips = $this->entityManager->getRepository(Trip::class)->findAll();

        return array_map(function (Trip $trip)  {
            return new TripView(
                $trip->getName(),
                $trip->getMeasureInterval(),
                max($trip->getMeasuresDistances()),
                $this->averageSpeedCalculator->calculate(
                    $trip->getMeasureInterval(),
                    $trip->getMeasuresDistances()
                )
            );
        }, $trips);
    }
}
