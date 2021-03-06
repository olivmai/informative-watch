<?php

namespace Test\Domain\InformationSource\Model;

require __DIR__ . '/../../../../config/db_config_test.php';

use App\Database\PdoClient;
use App\Domain\InformationSource\InformationSourceException;
use App\Domain\InformationSource\Model\InformationSourceFactory;
use App\Domain\InformationSource\Model\InformationSourceRepository;
use Exception;
use PHPUnit\Framework\TestCase;
use Test\InitDatabaseSchema;

/**
 * Class InformationSourceRepositoryTest
 * @package Test\Domain\InformationSource\Model
 * @covers \App\Domain\InformationSource\Model\InformationSourceRepository
 * @uses \App\Domain\InformationSource\Model\InformationSource
 * @uses \App\Domain\InformationSource\Model\InformationSourceFactory
 * @uses \App\Database\PdoClient
 * @uses \App\Database\AbstractPdoClient
 */
class InformationSourceRepositoryTest extends TestCase
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
     * @covers \App\Domain\InformationSource\Model\InformationSourceRepository::insert
     * @uses \App\Domain\InformationSource\Model\InformationSourceModelManager
     * @uses \App\Domain\InformationSource\Model\InformationSource
     * @uses \App\Database\AbstractPdoClient
     * @uses \App\Database\PdoClient
     * @throws InformationSourceException
     * @throws Exception
     */
    public function testCanCreateInformationSource(): void
    {
        $newInformationSource = InformationSourceDataProvider::getOne();

        $repo = new InformationSourceRepository(PdoClient::getInstance());

        $createdId = $repo->insert($newInformationSource);

        self::assertIsInt($createdId);
    }
}
