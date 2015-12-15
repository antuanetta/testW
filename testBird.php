<?php
require_once('autoload.php');

$path = './lib/vendor/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

use Antuanetta\SingingBird;
use Antuanetta\RealLocation;

$bird1 = new SingingBird('Happy bird', new RealLocation(0,0,0));
$bird1->flyTo(new RealLocation(2,2,2));
$bird1->killBird();

$birdList=$bird1->cloneBird(3);
//$bird1->flyTo(new RealLocation(4,4,4));
print_r($bird1);
print_r($birdList);