<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber\Strategy;

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;

/**
 * Class StrategyInterface
 */
interface StrategyInterface
{
    /**
     * @param string $number
     *
     * @return string
     */
    public function cleanUp(string $number): string;
    /**
     * @param string $number
     *
     * @return void
     * @throws InvalidNumberFormat
     */
    public function checkValidity(string $number): void;
}
