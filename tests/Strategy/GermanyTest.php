<?php

declare(strict_types=1);

use HJenneberg\LinkPhoneNumber\Strategy\Germany;
use PHPUnit\Framework\TestCase;

/**
 * Class GermanyTest
 */
final class GermanyTest extends TestCase
{
    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     * @covers \HJenneberg\LinkPhoneNumber\Strategy\Germany::isValid
     */
    public function it_detects_valid_numbers(): void
    {
        $strategy = new Germany();

        self::assertTrue($strategy->isValid('0049 711 123 456 789 - 0'));
        self::assertTrue($strategy->isValid('+49 711 123 456 789 - 0'));
        self::assertTrue($strategy->isValid('0711 123 456 789 - 0'));
    }

    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     * @covers \HJenneberg\LinkPhoneNumber\Strategy\Germany::isValid
     */
    public function it_detects_invalid_phone_numbers(): void
    {
        $strategy = new Germany();

        self::assertFalse($strategy->isValid('123456789'));
    }

    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     */
    public function it_works_for_all_numbers_I_know()
    {
        $strategy = new Germany();

        self::assertSame('+497111234567890', $strategy->transform('+497111234567890'));
        self::assertSame('+497111234567890', $strategy->transform('00497111234567890'));
        self::assertSame('+497111234567890', $strategy->transform('07111234567890'));
    }

    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     */
    public function it_even_works_for_this_commonly_used_invalid_format()
    {
        $strategy = new Germany();

        self::assertSame('+497111234567890', $strategy->transform('+4907111234567890'));
        self::assertSame('+497111234567890', $strategy->transform('004907111234567890'));
    }
}
