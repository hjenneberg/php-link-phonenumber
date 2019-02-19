<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber;

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;

/**
 * Class Link
 */
class Link
{
    /**
     * @param string $number
     *
     * @return string
     * @throws InvalidNumberFormat
     */
    public static function get(string $number): string
    {
        $number = preg_replace('#[^\d+]#', '', $number);

        $hasCountryTrunk = 0 === strpos($number, '+');
        if ($hasCountryTrunk) {
            return $number;
        }

        $hasCountryCode = 0 === strpos($number, '00');
        if ($hasCountryCode) {
            return '+' . substr($number, 2);
        }

        $hasAreaCode = 0 === strpos($number, '0');
        if (!$hasAreaCode) {
            throw new InvalidNumberFormat(sprintf(
                'Can\'t recognize the format of the phone number "%s"', $number
            ));
        }

        return '+49' . substr($number, 1);
    }
}
