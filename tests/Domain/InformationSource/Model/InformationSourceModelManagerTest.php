<?php

namespace Test\Domain\InformationSource\Model;

use App\Domain\InformationSource\Model\InformationSource;
use App\Domain\InformationSource\Model\InformationSourceModelManager;
use PHPUnit\Framework\TestCase;

class InformationSourceModelManagerTest extends TestCase
{
    public function testCanCreateInformationSource(): void
    {
        $newInformationSource = InformationSourceDataProvider::getOne();
        $infoSrcManager = new InformationSourceModelManager();

        $sourceSaved = $infoSrcManager->save($newInformationSource);

        self::assertInstanceOf(InformationSource::class, $sourceSaved);
        self::assertIsInt($sourceSaved->getId());
    }
}
