<?php

namespace CarPrice;

use CarPrice\Location;

interface Bird {
    
    function setKind($type);
    function getKind();
    
    function getLocation();
    function setLocation(Location $location);
    function flyTo(Location $location);
    
    function setMelody($melody);
    
    function singMelody(); // ����� ������� �� kind
    
    function killBird();
    function cloneBird($count);
}