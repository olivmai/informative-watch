<?php

namespace Test\Domain\InformationSource\Model;

use App\Domain\InformationSource\Model\InformationSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class InformationSourceFactoryTest
 * @package Test\Domain\InformationSource\Model
 * @covers \App\Domain\InformationSource\Model\InformationSourceFactory
 * @uses App\Domain\InformationSource\Model\InformationSource
 */
class InformationSourceFactoryTest extends TestCase
{
    public function testCreate(): void
    {
        $informationSource = InformationSourceFactory::create([
            'id' => 1,
            'title' => 'test title',
            'url' => 'http://test-url.com',
            'image' => 'random-image.jpeg',
            'description' => 'description test bla bla bla',
        ]);

        self::assertEquals(1, $informationSource->getId());
        self::assertEquals('test title', $informationSource->getTitle());
        self::assertEquals('http://test-url.com', $informationSource->getUrl());
        self::assertEquals('random-image.jpeg', $informationSource->getImage());
        self::assertEquals('description test bla bla bla', $informationSource->getDescription());
    }
}
