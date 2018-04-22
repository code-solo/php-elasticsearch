<?php

namespace CodeSolo\ElasticsearchTests\Unit;

use PHPUnit\Framework\TestCase;

abstract class AbstractTest extends TestCase
{
    /**
     * Asserts that two given arrays are equal.
     *
     * @param array $expectedArray
     * @param array $actualArray
     * @param string $message
     */
    public static function assertArraySame($expectedArray, $actualArray, $message = '')
    {
        static::assertJsonStringEqualsJsonString(
            json_encode($expectedArray),
            json_encode($actualArray),
            $message
        );
    }
}