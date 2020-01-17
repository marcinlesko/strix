<?php
namespace Ap\View;

class TripView
{
    private $name;
    
    private $measureInterval;
    
    private $distances;
    
    public function __construct(string $name, int $measureInterval, array $distances)
    {
        $this->name = $name;
        $this->measureInterval = $measureInterval;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getMeasureInterval()
    {
        return $this->measureInterval;
    }
    
    public function getDistances()
    {
        
    }
}