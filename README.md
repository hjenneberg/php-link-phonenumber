# php-link-phonenumber

A tiny library to transform any phone number to a format usable in an href attribute of an html anchor.

## Installation

The library isn't available via Packagist. Installation via [Composer](https://getcomposer.org) is recommend.
 
Add the repository to your `composer.json` file:

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

use HJenneberg\LinkPhoneNumber\Link;

echo Link::get('0711 123 45 67 89'); // results in +49711123456789
```
