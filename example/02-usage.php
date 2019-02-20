<?php

declare(strict_types=1);

# you may not require this line if you are using some kind of auto loader
require_once '../vendor/autoload.php';

use HJenneberg\LinkPhoneNumber\Link;
use HJenneberg\LinkPhoneNumber\Strategy\Germany;

// create an instance of an area strategy
$strategy = new Germany();

// create an instance of Link using the strategy
$link = new Link($strategy);

// execute
echo $link->get('0711 123 45 67 89') . PHP_EOL; // results in +49711123456789
