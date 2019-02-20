<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber\Strategy;

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;

/**
 * Class AbstractStrategy
 */
abstract class AbstractStrategy implements StrategyInterface
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
}
