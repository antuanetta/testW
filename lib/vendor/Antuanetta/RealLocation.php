<?php

namespace Antuanetta;

use CarPrice\Location;

class RealLocation extends Location
{
    public function __construct($x, $y, $z)
    {
        if (!is_int($x) && !is_int($y) && !is_int($z)) {
            throw new Exception('Wrong location');
        }
    
        $this->setX($x);
        $this->setY($y);
        $this->setZ($z);
    }
}