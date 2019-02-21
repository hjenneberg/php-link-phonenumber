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
        if (!$this->strategy->isValid($number)) {
            throw new InvalidNumberFormat(sprintf('Invalid number format for number "%s"', $number));
        }

        return $this->strategy->transform($this->strategy->cleanUp($number));
    }
}
