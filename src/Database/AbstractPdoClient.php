<?php

namespace App\Database;

use PDO;

abstract class AbstractPdoClient
{
    /**
     * @var PDO
     */
    private PDO $connexion;

    /**
     * PdoClient should be instanciate via PdoClient::getInstance().
     * Only purpose of this constructor is to set up config settings for pdo instance
     */
    protected function __construct()
    {
        $pdo_dsn = 'mysql:host=' . SERVER . ':' . PORT . ';dbname=' . DB_NAME;
        $this->connexion = new PDO($pdo_dsn, DB_USER, DB_PASSWD);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnexion(): PDO
    {
        return $this->connexion;
    }
}
