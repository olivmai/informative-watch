<?php

namespace Test\Domain\InformationSource\Controller;

use App\Database\PdoClient;
use App\Domain\InformationSource\Controller\InformationSourceListController;
use App\Domain\InformationSource\Model\InformationSourceModelManager;
use App\Domain\InformationSource\Model\InformationSourceRepository;
use App\Http\Response;
use App\Http\ResponseInterface;
use App\View\Twig;
use PHPUnit\Framework\TestCase;

/**
 * Class InformationSourceListControllerTest
 * @package Test\Domain\InformationSource\Controller
 * @covers \App\Domain\InformationSource\Controller\InformationSourceListController
 * @uses App\Database\AbstractPdoClient
 * @uses App\Database\PdoClient
 * @uses App\Domain\InformationSource\Model\InformationSourceModelManager
 * @uses App\View\Twig
 * @uses App\Domain\InformationSource\Model\InformationSourceRepository
 * @uses \App\Http\Response
 */
class InformationSourceListControllerTest extends TestCase
{
    public function testInformationSourceListController(): void
    {
        $repo = new InformationSourceRepository(PdoClient::getInstance());
        $manager = new InformationSourceModelManager($repo);
        $listController = new InformationSourceListController($manager, new Twig());
        $response = $listController();

        self::assertInstanceOf(ResponseInterface::class, $response);
        self::assertEquals('template', $response->getType());
        self::assertIsString($response->getContent());
        self::assertStringContainsString('Homepage', $response->getContent());
    }
}
