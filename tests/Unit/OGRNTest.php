<?php

namespace Tests\Unit;

use Gomzyakov\Numbers\KPP;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Gomzyakov\Numbers\OGRN
 */
final class OGRNTest extends TestCase
{
    // TODO ОГРН должен состоять из 13 или 15 циф

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
