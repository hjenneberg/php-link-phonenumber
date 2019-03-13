<?php

declare(strict_types=1);

use HJenneberg\LinkPhoneNumber\Exception\InvalidNumberFormat;
use HJenneberg\LinkPhoneNumber\Link;
use HJenneberg\LinkPhoneNumber\Strategy\AbstractStrategy;
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
     *
     * @throws ReflectionException
     * @throws InvalidNumberFormat
     */
    public function it_fails_on_invalid_format()
    {
        $strategy = self::getMockForAbstractClass(AbstractStrategy::class);
        $strategy->method('isValid')->willReturn(false);

        /** @var StrategyInterface $strategy */
        $link = new Link($strategy);

        self::expectException(InvalidNumberFormat::class);

        $link->get('123456789');
    }

    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     *
     * @throws ReflectionException
     * @throws InvalidNumberFormat
     */
    public function it_uses_the_given_strategy_for_transformation()
    {
        $strategy = self::getMockForAbstractClass(AbstractStrategy::class);
        $strategy->method('isValid')->willReturn(true);
        $strategy->expects(static::once())->method('transform');

        /** @var StrategyInterface $strategy */
        $link = new Link($strategy);

        $link->get('0123456789');
    }
}
