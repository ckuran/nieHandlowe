<?php

use ckuran\PolishSundayProvider;
use PHPUnit\Framework\TestCase;

class SundayProviderTest extends TestCase
{
    public function testBasics()
    {
        $provider = new PolishSundayProvider();

        $test1 = new \DateTime('2019-01-01');
        self::assertFalse($provider->isNonTradeable($test1));

        $test2 = new \DateTime('2019-01-27');
        self::assertTrue($provider->isNonTradeable($test2));

        $test3 = new \DateTime('2019-12-24 14:00:00');
        self::assertFalse($provider->isNonTradeable($test3));

        $test4 = new \DateTime('2019-12-29 18:30:00');
        self::assertTrue($provider->isNonTradeable($test4));

        $test5 = new \DateTime('2019-06-15T15:19:21+00:00');
        self::assertFalse($provider->isNonTradeable($test5));

        $test6 = new \DateTime('2019-06-30T15:19:21+00:00');
        self::assertTrue($provider->isNonTradeable($test6));
    }
}
