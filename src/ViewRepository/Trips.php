<?php declare(strict_types=1);
namespace App\ViewRepository;

use App\Entity\Trip;
use App\View\TripView;
use App\ViewFactory\TripViewFactory;
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
     * @var TripViewFactory
     */
    private $tripViewFactory;

    /**
     * @param EntityManagerInterface $entityManager
     * @param TripViewFactory $tripViewFactory
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        TripViewFactory $tripViewFactory
    ) {
        $this->entityManager = $entityManager;
        $this->tripViewFactory = $tripViewFactory;
    }

    /**
     * @return TripView[]
     */
    public function getAll(): array
    {
        $trips = $this->entityManager->getRepository(Trip::class)->findAll();

        return array_map(function (Trip $trip)  {
            return $this->tripViewFactory->create($trip);
        }, $trips);
    }
}
