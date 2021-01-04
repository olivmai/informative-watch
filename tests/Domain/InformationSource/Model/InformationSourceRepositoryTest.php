<?php

namespace Test\Domain\InformationSource\Model;

require __DIR__ . '/../../../../config/db_config_test.php';

use App\Database\PdoClient;
use App\Domain\InformationSource\InformationSourceException;
use App\Domain\InformationSource\Model\InformationSourceFactory;
use App\Domain\InformationSource\Model\InformationSourceRepository;
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

    /**
     * @covers \App\Domain\InformationSource\Model\InformationSourceRepository::insert
     * @throws InformationSourceException
     */
    public function testCanCreateInformationSource(): void
    {
        $newInformationSource = InformationSourceFactory::create([
            'id' => null,
            'title'=> 'Le tdd en php',
            'url' => 'https://youtu.be/cWyOA0iIqKc',
            'image' => 'lior-chamla.jpeg',
            'description' => 'Vidéo live coding de Lior Chamla',
            'error' => 'bug',
        ]);

        $repo = new InformationSourceRepository(PdoClient::getInstance());

        $createdId = $repo->insert($newInformationSource);

        self::assertIsInt($createdId);
    }
}
