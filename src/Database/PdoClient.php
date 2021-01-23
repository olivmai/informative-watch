<?php

namespace App\Database;

use PDO;

class PdoClient extends AbstractPdoClient implements DatabaseClientInterface
{
    public static ?PdoClient $instance = null;
    public PDO $connexion;

    /** @codeCoverageIgnore  */
    private function __clone()
    {
    }

    public static function getInstance(): PdoClient
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
