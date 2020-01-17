<?php

namespace App\DataFixtures;

use App\Entity\Measure;
use App\Entity\Trip;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private static $measureIntervals = [15, 20, 12];

    private static $distances = [
        [0.0, 0.19, 0.5, 0.75, 1.0, 1.25,  1.5, 1.75, 2.0, 2.25],
        [0.0, 0.23, 0.46, 0.69, 0.92, 1.15, 1.38, 1.61],
        [0.0, 0.11, 0.22, 0.33, 0.44, 0.65, 1.08, 1.26, 1.68, 1.89, 2.1, 2.31, 2.52, 3.25],
    ];

    public function load(ObjectManager $manager): void
    {
        $tripNo = 1;
        foreach (self::$measureIntervals as $index => $measureInterval) {
            $trip = new Trip();
            $trip->setName("Trip {$tripNo}");
            $trip->setMeasureInterval($measureInterval);
            foreach ($this->getMeasuresByDistanceIndex($index) as $measure) {
                $trip->addMeasure($measure);
            }
            $manager->persist($trip);
            $tripNo++;
        }

        $manager->flush();
    }

    private function getMeasuresByDistanceIndex(int $index): array
    {
        $tripMeasures = [];
        foreach (self::$distances[$index] as $distance) {
            $tripMeasure = new Measure();
            $tripMeasure->setDistance($distance);
            $tripMeasures[] = $tripMeasure;
        }
        return $tripMeasures;
    }
}
