<?php
 namespace Test;

use App\Database\PdoClient;

trait InitDatabaseSchema
{
    public function initDatabaseSchema(): void
    {
        $pdo = PdoClient::getInstance()->getConnexion();

        $dropQuery = $pdo->prepare(
            "DROP TABLE IF EXISTS sources"
        );
        $dropQuery->execute();

        $createQuery = $pdo->prepare(
            "CREATE TABLE IF NOT EXISTS sources (
                    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    title varchar(255) NOT NULL,
                    url varchar(32) NOT NULL,
                    image varchar(255),
                    description text
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
        );
        $createQuery->execute();
    }

    public function truncateTables(): void
    {
        $pdo = PdoClient::getInstance()->getConnexion();

        $truncateQuery = $pdo->prepare(
            "TRUNCATE TABLE sources"
        );

        $truncateQuery->execute();
    }
}
