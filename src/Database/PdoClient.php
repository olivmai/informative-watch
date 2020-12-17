<?php

namespace App\Database;

use PDO;

class PdoClient extends AbstractPdoClient implements DatabaseClientInterface
{
    public static ?DatabaseClientInterface $instance = null;
    public PDO $connexion;

    private function __clone()
    {
    }

    public static function getInstance(): ?DatabaseClientInterface
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
