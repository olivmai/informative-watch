<?php

namespace Test\Database;

use App\Database\PdoClient;
use PDO;
use PHPUnit\Framework\TestCase;

/**
 * Class PdoClientTest
 * @package Test\Database
 * @covers \App\Database\PdoClient
 * @uses \App\Database\AbstractPdoClient
 */
class PdoClientTest extends TestCase
{
    public function testGetInstance(): void
    {
        self::assertInstanceOf(PdoClient::class, PdoClient::getInstance());
    }

    public function testGetInstanceWhenNull(): void
    {
        $pdoClient = PdoClient::getInstance();
        $pdoClient::$instance = null;

        self::assertInstanceOf(PdoClient::class, $pdoClient::getInstance());
    }

    public function getConnexion(): void
    {
        $pdoClient = PdoClient::getInstance();
        self::assertInstanceOf(PDO::class, $pdoClient->getConnexion());
    }
}
