<?php

namespace Test\Http;

use App\Http\Request;
use App\Http\Router;
use App\View\Twig;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class RouterTest
 * @package Test\Http
 * @covers \App\Http\Router
 * @uses \App\Http\Response
 */
class RouterTest extends TestCase
{
    /**
     * @throws Exception
     * @uses App\Database\AbstractPdoClient
     * @uses App\Database\PdoClient
     * @uses App\Domain\InformationSource\Controller\InformationSourceListController
     * @uses App\Domain\InformationSource\Model\InformationSourceModelManager
     * @uses App\Domain\InformationSource\Model\InformationSourceRepository
     * @uses App\Http\Request
     * @uses App\View\Twig
     */
    public function testHandleHomepage(): void
    {
        $request = new Request([
            'path' => '/',
            'method' => 'GET',
            'parameters' => []
        ]);

        $router = new Router(new Twig());
        $response = $router->handle($request);

        self::assertStringContainsString('Homepage', $response->getContent());
    }

    /**
     * @throws Exception
     * @uses App\Http\Request
     * @uses App\View\Twig
     */
    public function testHandleNewForm(): void
    {
        $request = new Request([
            'path' => '/new',
            'method' => 'GET',
            'parameters' => []
        ]);

        $router = new Router(new Twig());
        $response = $router->handle($request);

        self::assertStringContainsString('Ajouter une nouvelle source', $response->getContent());
    }
}
