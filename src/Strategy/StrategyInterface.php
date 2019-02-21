<?php

declare(strict_types=1);

namespace HJenneberg\LinkPhoneNumber\Strategy;

/**
 * Class StrategyInterface
 */
interface StrategyInterface
{
    /**
     * Check if the given number is in a valid format for that area
     *
     * @param string $number
     *
     * @return bool
     */
    public function isValid(string $number): bool;

    /**
     * Remove all characters that do not belong to a valid phone number
     *
     * E.g. spaces, paranthesis, dashes
     *
     * @param string $number
     *
     * @return string
     */
    public function cleanUp(string $number): string;

    /**
     * @param string $number
     * @return string
     */
    public function transform(string $number): string;
}
