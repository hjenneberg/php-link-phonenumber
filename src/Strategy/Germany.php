<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber\Strategy;

/**
 * Class Germany
 */
class Germany extends AbstractStrategy
{
    /**
     * @param string $number
     *
     * @return bool
     */
    public function isValid(string $number): bool
    {
        return 1 === preg_match('#^\+49|0049|0[1-9]#', $this->cleanUp($number));
    }

    /**
     * @param string $number
     *
     * @return string
     */
    public function transform(string $number): string
    {
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
