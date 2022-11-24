<?php

namespace Tests\Unit;

use Gomzyakov\Numbers\KPP;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Gomzyakov\Numbers\KPP
 */
final class KPPTest extends TestCase
{
    public function test_create_method(): void
    {
        $number = KPP::create('123123123');

        self::assertTrue($number->isValid());
    }

    public function test_constructor(): void
    {
        $inn = new KPP('123123123');

        self::assertTrue($inn->isValid());
    }

    public function test_incorrect_inn(): void
    {
        $inn = new KPP('123');

        self::assertFalse($inn->isValid());
    }
}
