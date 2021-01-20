<?php

namespace Test\Domain\Model;

use App\Domain\InformationSource\Model\InformationSource;
use App\Domain\InformationSource\Model\InformationSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class InformationSourceTest
 * @package Test\Domain\Model
 * @covers \App\Domain\InformationSource\Model\InformationSource
 * @uses \App\Domain\InformationSource\Model\InformationSourceFactory
 */
class InformationSourceTest extends TestCase
{
    private InformationSource $informationSource;

    protected function setUp(): void
    {
        parent::setUp();
        $this->informationSource = InformationSourceFactory::create([
            'id' => 1,
            'title' => 'test title',
            'url' => 'http://this-is-a-test.com',
            'description' => 'this is a text for test purpose which means nothing but it is readable and that\'s why your are loosing your time reading it. But really, stop. Your are loosing your precious time',
            'image' => 'https://picsum.photos/200/150'
        ]);
    }

    public function testToArray(): void
    {
        $expectedArray = [
            'title' => 'test title',
            'url' => 'http://this-is-a-test.com',
            'description' => 'this is a text for test purpose which means nothing but it is readable and that\'s why your are loosing your time reading it. But really, stop. Your are loosing your precious time',
            'image' => 'https://picsum.photos/200/150'
        ];

        self::assertEquals($expectedArray, $this->informationSource->toArray());
    }

    public function testGetTitle(): void
    {
        self::assertEquals('test title', $this->informationSource->getTitle());
    }

    public function testGetUrl(): void
    {
        self::assertEquals('http://this-is-a-test.com', $this->informationSource->getUrl());
    }

    public function testGetImage(): void
    {
        self::assertEquals('https://picsum.photos/200/150', $this->informationSource->getImage());
    }

    public function testGetDescription(): void
    {
        self::assertEquals('this is a text for test purpose which means nothing but it is readable and that\'s why your are loosing your time reading it. But really, stop. Your are loosing your precious time', $this->informationSource->getDescription());
    }

    public function testGetId(): void
    {
        self::assertEquals(1, $this->informationSource->getId());
    }

    public function testSetTitle(): void
    {
        $newTitle = "new test title";
        $this->informationSource->setTitle($newTitle);

        self::assertEquals($newTitle, $this->informationSource->getTitle());
    }

    public function testSetUrl(): void
    {
        $newUrl = "http://this-is-a-new-test.com";
        $this->informationSource->setUrl($newUrl);

        self::assertEquals($newUrl, $this->informationSource->getUrl());
    }

    public function testSetImage(): void
    {
        $newImage = "https://picsum.photos/200/150?grayscale";
        $this->informationSource->setImage($newImage);

        self::assertEquals($newImage, $this->informationSource->getImage());
    }

    public function testSetDescription(): void
    {
        $newDescription = "let's make it shorter, to avoid time waste";
        $this->informationSource->setDescription($newDescription, $this->informationSource->getDescription());

        self::assertEquals($newDescription, $this->informationSource->getDescription());
    }

    public function testSetIdShouldNotChange(): void
    {
        $newId = 42;
        $this->informationSource->setId($newId);

        self::assertEquals($newId, $this->informationSource->getId());
    }
}
