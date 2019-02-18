<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber;

/**
 * Class Link
 */
class Link
{
    /**
     * @param string $number
     *
     * @return string
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

        return '+49' . substr($number, 1);
    }
}
