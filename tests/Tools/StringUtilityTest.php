<?php

namespace Test\Tools;

use App\Tools\StringUtility;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

/**
 * Class StringUtilityTest
 * @package Test\Tools
 * @covers \App\Tools\StringUtility
 */
class StringUtilityTest extends TestCase
{
    public function testSlugify(): void
    {
        $textToSlugify = "test_avec/des--caraCter*SPeciaux";
        assertEquals('test-avec-des-caracter-speciaux', StringUtility::slugify($textToSlugify));
    }

    public function testEmptySlugify(): void
    {
        $textToSlugify = "";
        assertEquals('n-a', StringUtility::slugify($textToSlugify));
    }

    public function testGetArrayFromString(): void
    {
        $string = "test.with.multiple.separators";
        $expectedArray = ['test', 'with', 'multiple', 'separators'];

        self::assertEquals($expectedArray, StringUtility::getArrayFromString($string));
    }
}
