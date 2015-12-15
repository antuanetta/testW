<?php

namespace CarPrice;

abstract class Location{
    private $x;
    private $y;
    private $z;
    
    public function setX($value)
    {
        $this->x = $value;
    }
    
    public function setY($value)
    {
        $this->y = $value;
    }
    
    public function setZ($value)
    {
        $this->z = $value;
    }
    
    public function getX()
    {
        return $this->x;
    }
    
    public function getY()
    {
        return $this->y;
    }
    
    public function getZ()
    {
        return $this->z;
    }
}