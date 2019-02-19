# php-link-phonenumber

A library to transform any phone number to a format usable in an href attribute of an html anchor.

> The library assumes you're transforming german phone numbers because that's the only use case for me right now. 

## Installation

The library isn't available via Packagist. Installation via [Composer](https://getcomposer.org) is recommend.
 
Add the repository to your `composer.json` file under the _repositories_ key:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/hjenneberg/php-link-phonenumber"
        }
    ]
}
```

Add the library as a dependency to your project:

```json
{
    "require": {
        "hjenneberg/php-link-phonenumber": "^0.0.1"
    }
}
```

## Usage

Import the class `HJenneberg\LinkPhoneNumber\Link` and call Link::get() with the phone number as a parameter:

```php
<?php

declare(strict_types=1);

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;
use HJenneberg\LinkPhoneNumber\Link;

try {
    echo Link::get('0711 123 45 67 89'); // results in +49711123456789
} catch (InvalidNumberFormat $e) {
    echo $e->getMessage();
}
```
`./example/01-basic.php`
