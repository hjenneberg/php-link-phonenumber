<?php

declare(strict_types=1);

use HJenneberg\LinkPhoneNumber\Strategy\AbstractStrategy;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractStrategyTest
 */
final class AbstractStrategyTest extends TestCase
{
    /**
     * @noinspection PhpMethodNamingConventionInspection
     *
     * @test
     * @dataProvider dirtyNumbers
     *
     * @param $number
     * @param $expected
     *
     * @throws ReflectionException
     */
    public function cleanUp_removes_all_unwanted_characters(string $number, string $expected): void
    {
        /** @var AbstractStrategy $strategy */
        $strategy = $this->getMockForAbstractClass(AbstractStrategy::class);

        self::assertSame($expected, $strategy->cleanUp($number));
    }

    /**
     * @return array
     */
    public function dirtyNumbers(): array
    {
        return [
            ['number' => '(0711) 123 45 67 89 - 0', 'expected' => '07111234567890'],
            ['number' => '0345 / 123 45 67 89', 'expected' => '0345123456789'],
            ['number' => '+49 3943 123 45 67 89', 'expected' => '+493943123456789'],
        ];
    }

}
