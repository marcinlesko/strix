<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="trip_measures")
 * @ORM\Entity(repositoryClass="App\Repository\MeasureRepository")
 */
class Measure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $distance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trip", inversedBy="measures")
     */
    private $trip;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDistance(): string
    {
        return $this->distance;
    }

    /**
     * @param string $distance
     * @return $this
     */
    public function setDistance(string $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * @return Trip
     */
    public function getTrip(): Trip
    {
        return $this->trip;
    }

    /**
     * @param Trip $trip
     * @return $this
     */
    public function setTrip(Trip $trip): self
    {
        $this->trip = $trip;
        return $this;
    }
}
