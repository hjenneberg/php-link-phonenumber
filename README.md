# php-link-phonenumber

A library to transform any phone number to a format usable in the href attribute of an html anchor.

It only works for german phone number formats because that's the only use case for me right now. 
Feel free to implement strategies for other formats.

This is just a little test project to try out different GitHub related features. 
Maybe you should not use this in production. 

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
        "hjenneberg/php-link-phonenumber": "^0.2.4"
    }
}
```

## Usage

I'm assuming you use some kind of auto loader (e.g. composer autoload).

```php
<?php

use HJenneberg\LinkPhoneNumber\Link;
use HJenneberg\LinkPhoneNumber\Strategy\Germany;

// create an instance of an area strategy
$strategy = new Germany();

// create an instance of Link using the strategy
$link = new Link($strategy);

// execute
echo $link->get('0711 123 45 67 89') . PHP_EOL; // results in +49711123456789
```
`./example/02-usage.php`

### Examples

```php
<?php

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;
use HJenneberg\LinkPhoneNumber\Link;
use HJenneberg\LinkPhoneNumber\Strategy\Germany;

try {
    echo (new Link(new Germany()))->get('0711 123 45 67 89') . PHP_EOL; // results in +49711123456789
} catch (InvalidNumberFormat $e) {
    echo $e->getMessage();
}
```
`./example/01-basic.php`
