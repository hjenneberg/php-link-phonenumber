<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber\Strategy;

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;

/**
 * Class Germany
 */
class Germany extends AbstractStrategy
{
    /**
     * @param string $number
     *
     * @return void
     * @throws InvalidNumberFormat
     */
    public function checkValidity(string $number): void
    {
        if (!preg_match('#^\+49|0049|0[1-9]#', $number)) {
            throw new InvalidNumberFormat(sprintf('Invalid number format for number "%s"', $number));
        }
    }
}
