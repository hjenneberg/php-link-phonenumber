<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber;

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;
use HJenneberg\LinkPhoneNumber\Strategy\StrategyInterface;

/**
 * Class Link
 */
class Link
{
    /**
     * @var StrategyInterface
     */
    private $strategy;

    /**
     * @param StrategyInterface $strategy
     */
    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param string $number
     *
     * @return string
     * @throws InvalidNumberFormat
     */
    public function get(string $number): string
    {
        $number = $this->strategy->cleanUp($number);

        $this->strategy->checkValidity($number);

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
