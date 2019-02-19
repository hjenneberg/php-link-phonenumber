<?php

declare(strict_types=1);

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;
use HJenneberg\LinkPhoneNumber\Link;

try {
    echo Link::get('0711 123 45 67 89'); // results in +49711123456789
} catch (InvalidNumberFormat $e) {
    echo $e->getMessage();
}
