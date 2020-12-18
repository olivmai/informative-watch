<?php

require __DIR__ . '/../../../../config/db_config_test.php';

use App\Database\PdoClient;
use App\Domain\InformationSource\Model\InformationSourceFactory;
use App\Domain\InformationSource\Model\InformationSourceRepository;
use PHPUnit\Framework\TestCase;

class InformationSourceRepositoryTest extends TestCase
{
    public function testCanCreateInformationSource(): void
    {
        $newInformationSource = InformationSourceFactory::create([
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
