<?php

declare(strict_types=1);

use HJenneberg\LinkPhoneNumber\Link;
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
     * @param string $number
     * @param string $expected
     */
    public function it_works_for_common_phone_numbers(string $number, string $expected)
    {
        self::assertSame($expected, Link::get($number));
    }

    /**
     * @return array
     */
    public function number(): array
    {
        return [
            ['number' => '0711 123 45 67 89', 'expected' => '+49711123456789'],
            ['number' => '+49 711 123 45 67 89', 'expected' => '+49711123456789'],
            ['number' => '0049 711 123 45 67 89', 'expected' => '+49711123456789'],
        ];
    }
}
