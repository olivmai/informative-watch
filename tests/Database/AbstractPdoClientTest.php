<?php

namespace Test\Database;

use App\Database\AbstractPdoClient;
use App\Database\PdoClient;
use PDO;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractPdoClientTest
 * @package Test\Database
 * @covers \App\Database\AbstractPdoClient
 */
class AbstractPdoClientTest extends TestCase
{
    private $newAnonymousClassFromAbstract;

    protected function setUp(): void
    {
        parent::setUp();
        // Create a new instance from the Abstract Class
        $this->newAnonymousClassFromAbstract = new class extends AbstractPdoClient {
            public function resetInstance(): void
            {
                self::$instance = null;
            }
        };
    }

    public function testAbstractGetConnexion(): void
    {
        self::assertInstanceOf(PDO::class, $this->newAnonymousClassFromAbstract->getConnexion());
    }
}
