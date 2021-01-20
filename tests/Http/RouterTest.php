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

        self::assertStringContainsString('Homepage', $router->handle($request));
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

        self::assertStringContainsString('Ajouter une nouvelle source', $router->handle($request));
    }
}
