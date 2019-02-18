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
     */
    public function it_works_for_certain_cases()
    {
        self::assertSame('+49711123456789', Link::get('0711 123 45 67 89'));
    }
}
