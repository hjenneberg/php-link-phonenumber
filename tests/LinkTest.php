<?php

declare(strict_types=1);

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;
use HJenneberg\LinkPhoneNumber\Link;
use HJenneberg\LinkPhoneNumber\Strategy\Germany;
use HJenneberg\LinkPhoneNumber\Strategy\StrategyInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class LinkTest
 */
final class LinkTest extends TestCase
{
    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     * @dataProvider number
     *
     * @param StrategyInterface $strategy
     * @param string $number
     * @param string $expected
     *
     * @throws InvalidNumberFormat
     */
    public function it_works_for_phone_numbers_I_know(StrategyInterface $strategy, string $number, string $expected)
    {
        self::assertSame($expected, (new Link($strategy))->get($number));
    }

    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     *
     * @throws InvalidNumberFormat
     */
    public function it_fails_on_missing_area_code()
    {
        /** @noinspection PhpParamsInspection */
        self::expectException(InvalidNumberFormat::class);

        (new Link(new Germany()))->get('123 456 789');
    }

    /**
     * @return array
     */
    public function number(): array
    {
        $germany = new Germany();

        return [
            ['strategy' => $germany, 'number' => '0711 123 45 67 89',     'expected' => '+49711123456789'],
            ['strategy' => $germany, 'number' => '+49 711 123 45 67 89',  'expected' => '+49711123456789'],
            ['strategy' => $germany, 'number' => '0049 711 123 45 67 89', 'expected' => '+49711123456789'],
        ];
    }
}
