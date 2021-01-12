<?php

namespace Test\Domain\InformationSource\Model;

use App\Database\PdoClient;
use App\Domain\InformationSource\InformationSourceException;
use App\Domain\InformationSource\Model\InformationSource;
use App\Domain\InformationSource\Model\InformationSourceModelManager;
use App\Domain\InformationSource\Model\InformationSourceRepository;
use PHPUnit\Framework\TestCase;
use Test\InitDatabaseSchema;

/**
 * Class InformationSourceModelManagerTest
 * @package Test\Domain\InformationSource\Model
 * @covers \App\Domain\InformationSource\Model\InformationSourceModelManager
 * @uses App\Database\AbstractPdoClient
 * @uses App\Database\PdoClient
 * @uses App\Domain\InformationSource\Model\InformationSource
 * @uses App\Domain\InformationSource\Model\InformationSourceFactory
 * @uses App\Domain\InformationSource\Model\InformationSourceRepository
 */
class InformationSourceModelManagerTest extends TestCase
{
    use InitDatabaseSchema;

    protected function setUp(): void
    {
        parent::setUp();
        $this->initDatabaseSchema();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->truncateTables();
    }

    /**
     * @covers \App\Domain\InformationSource\Model\InformationSourceModelManager::save
     * @throws InformationSourceException
     */
    public function testCanCreateInformationSource(): void
    {
        $newInformationSource = InformationSourceDataProvider::getOne();
        $infoSrcManager = new InformationSourceModelManager(new InformationSourceRepository(PdoClient::getInstance()));

        $sourceSaved = $infoSrcManager->save($newInformationSource);

        self::assertInstanceOf(InformationSource::class, $sourceSaved);
        self::assertIsInt($sourceSaved->getId());
    }

    /**
     * @covers \App\Domain\InformationSource\Model\InformationSourceModelManager::delete
     * @throws InformationSourceException
     */
    public function testCanDeleteInformationSource(): void
    {
        // given we have an information source in database
        $newInformationSource = InformationSourceDataProvider::getOne();
        $infoSrcManager = new InformationSourceModelManager(new InformationSourceRepository(PdoClient::getInstance()));

        $sourceSaved = $infoSrcManager->save($newInformationSource);

        // when we delete it
        $infoSrcManager->delete($sourceSaved);

        // we can't find it in database anymore
        $sourceDeleted = $infoSrcManager->find($sourceSaved->getId());

        self::assertNull($sourceDeleted);
    }
}
