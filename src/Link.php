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

        $number = '+49' . substr($number, 1);

        return $number;
    }
}