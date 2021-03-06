<?php

namespace Test\Http;

use App\Http\Request;
use App\Http\RequestInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 * @package Test\Http
 * @covers \App\Http\Request
 */
class RequestTest extends TestCase
{
    private RequestInterface  $request;

    protected function setUp(): void
    {
        parent::setUp();
        $_SERVER['PATH_INFO'] = "/";
        $_SERVER['REQUEST_METHOD'] = "GET";
        $_REQUEST = [];

        $this->request = new Request([
            'path' => $_SERVER['PATH_INFO'],
            'method' => $_SERVER['REQUEST_METHOD'],
            'parameters' => $_REQUEST
        ]);
    }

    /**
     * @covers \App\Http\Request::getMethod
     */
    public function testGetMethod(): void
    {
        self::assertEquals('GET', $this->request->getMethod());
        self::assertIsString($this->request->getMethod());
    }

    /**
     * @covers \App\Http\Request::getPath
     */
    public function testGetPath(): void
    {
        self::assertEquals('/', $this->request->getPath());
        self::assertIsString($this->request->getPath());
    }

    /**
     * @covers \App\Http\Request::getParameters
     */
    public function testGetParameters(): void
    {
        self::assertEmpty($this->request->getParameters());
    }
}
