<?php

require_once('autoload.php');

$path = './lib/vendor/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

use Antuanetta\Channel;
use Antuanetta\TV;

$srcChannels = [
	[1, '1', 123.77],
	[2, 'Russia 1' , 134.55],
	[3, 'TVC', 55.77]
];

$listChannels = [];
foreach ($srcChannels as $channel) {
	$listChannels[$channel[0]] = new Channel ($channel[0], $channel[1], $channel[2]);
}

$tv = new TV(false, $listChannels);
echo $tv . "<br/>";

$tv->turn();
$tv->switchToChannel(2);
$tv->changeContrast(false);
$tv->changeVolume(false);

echo $tv . "<br/>";
echo "<pre>";
print_r($tv);

