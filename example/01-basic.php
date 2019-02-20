<?php

declare(strict_types=1);

# you may not require this line if you are using some kind of auto loader
require_once '../vendor/autoload.php';

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;
use HJenneberg\LinkPhoneNumber\Link;
use HJenneberg\LinkPhoneNumber\Strategy\Germany;

try {
    echo (new Link(new Germany()))->get('0711 123 45 67 89') . PHP_EOL; // results in +49711123456789
} catch (InvalidNumberFormat $e) {
    echo $e->getMessage();
}
