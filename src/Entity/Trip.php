<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="trips")
 * @ORM\Entity(repositoryClass="App\Repository\TripRepository")
 */
class Trip
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $measureInterval;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Measure", mappedBy="trip", cascade={"persist"})
     * @ORM\OrderBy({"distance" = "ASC"})
     */
    private $measures;

    public function __construct()
    {
        $this->measures = new ArrayCollection();
    }

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMeasureInterval(): int
    {
        return $this->measureInterval;
    }

    /**
     * @param int $measureInterval
     * @return $this
     */
    public function setMeasureInterval(int $measureInterval): self
    {
        $this->measureInterval = $measureInterval;

        return $this;
    }

    /**
     * @return Measure[]
     */
    public function getMeasures(): array
    {
        return $this->measures->toArray();
    }

    /**
     * @return int[]
     */
    public function getMeasuresDistances(): array
    {
        return array_map(function (Measure $tripMeasures) {
            return $tripMeasures->getDistance();
        }, $this->getMeasures());
    }

    /**
     * @param Measure $measure
     * @return $this
     */
    public function addMeasure(Measure $measure): self
    {
        $measure->setTrip($this);
        $this->measures->add($measure);
        return $this;
    }
}
