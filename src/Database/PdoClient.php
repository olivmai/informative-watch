<?php

namespace App\Database;

require_once __DIR__ . '/../../config/db_config.php';

use PDO;

class PdoClient implements DatabaseClientInterface
{
    public static ?DatabaseClientInterface $instance = null;
    public PDO $connexion;

    /**
     * PdoClient constructor is private as we want to call it only via PdoClient::getInstance().
     * Only purpose of this constructor is to set up config settings for pdo instance
     */
    private function __construct()
    {
        $pdo_dsn = 'mysql:host=' . SERVER . ':' . PORT . ';dbname=' . DB_NAME;
        $this->connexion = new PDO($pdo_dsn, DB_USER, DB_PASSWD);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone() {}

    public static function getInstance(): ?self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnexion(): PDO
    {
        return $this->connexion;
    }
}
