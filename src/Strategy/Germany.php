<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber\Strategy;

/**
 * Class Germany
 */
class Germany implements StrategyInterface
{
    /**
     * @param string $number
     *
     * @return string
     */
    public function cleanUp(string $number): string
    {
        return preg_replace('#[^\d+]#', '', $number);
    }

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
            return preg_replace('#^\+490#', '+49', $number);
        }

        $hasCountryCode = 0 === strpos($number, '00');
        if ($hasCountryCode) {
            return '+' . substr(preg_replace('#^00490#', '0049', $number), 2);
        }

        return '+49' . substr($number, 1);
    }
}
