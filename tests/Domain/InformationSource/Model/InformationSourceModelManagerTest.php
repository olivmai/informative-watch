<?php

namespace Test\Domain\InformationSource\Model;

use App\Database\PdoClient;
use App\Domain\InformationSource\Model\InformationSource;
use App\Domain\InformationSource\Model\InformationSourceModelManager;
use App\Domain\InformationSource\Model\InformationSourceRepository;
use PHPUnit\Framework\TestCase;
use Test\InitDatabaseSchema;

class InformationSourceModelManagerTest extends TestCase
{
    use InitDatabaseSchema;

    protected function setUp(): void
    {
        parent::setUp();
        $this->initDatabaseSchema();
    }

    public function testCanCreateInformationSource(): void
    {
        $newInformationSource = InformationSourceDataProvider::getOne();
        $infoSrcManager = new InformationSourceModelManager(new InformationSourceRepository(PdoClient::getInstance()));

        $sourceSaved = $infoSrcManager->save($newInformationSource);

        self::assertInstanceOf(InformationSource::class, $sourceSaved);
        self::assertIsInt($sourceSaved->getId());
    }
}
