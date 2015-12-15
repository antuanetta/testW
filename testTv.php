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
print_r($tv->isOn());

$tv->turn();
print_r($tv->isOn());

$tv->switchToChannel(123);
print_r($tv->getCurrentChannel());

$tv->switchToChannel(2);
print_r($tv->getCurrentChannel());

print_r($tv);