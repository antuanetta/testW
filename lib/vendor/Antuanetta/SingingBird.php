<?php

namespace Antuanetta;

use CarPrice\Location;
use CarPrice\Bird;

class SingingBird implements Bird
{
    private $kind;
    private $location;
    private $alive;
    private $melody;
    
    public function __construct($type, Location $location)
    {
        $this->setKind($type);
        $this->setLocation($location);
        $this->alive = true;
        $this->setMelody('Happy to be alive melody');
    }
    
    public function __clone()
    {
        $this->alive = true;
    }
    
    public function setKind($type)
    {
        $this->kind = (string) $type;
    }
    
    public function getKind()
    {
        return $this->kind;
    }
    
    public function getLocation()
    {
        return $this->location;
    }
    
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }
    
    public function flyTo(Location $location)
    {
        $this->checkAlive();
        $this->setLocation($location);
    }
    
    public function setMelody($melody)
    {
        $this->melody = (string) $melody;
    }
    
    public function singMelody() // вывод зависит от kind
    {
        $this->checkAlive();
        echo $this->getKind() . ' ' . $this->getMelody();
    }
    
    public function killBird()
    {
        if ($this->isAlive()) {
            $this->alive = false;
        }
    }
    
    public function cloneBird($count)
    {
        if (!is_int($count)) {
            throw new Exception('Not an integer');
        }
    
        $clones = array();
        
        for ($i=0; $i < $count; $i++)
            $clones[] = clone $this;
            
        return $clones;
    }
    
    public function isAlive()
    {
        return $this->alive;
    }
    
    private function checkAlive()
    {
        if (!$this->isAlive()) {
            throw new Exception('Not alive');
        }
        
        return true;
    }
}