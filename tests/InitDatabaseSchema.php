<?php
 namespace Test;

use App\Database\PdoClient;

trait InitDatabaseSchema
{
    public function initDatabaseSchema(): void
    {
        $pdo = PdoClient::getInstance()->getConnexion();
        $query = $pdo->prepare(
            "CREATE TABLE IF NOT EXISTS sources (
                    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    title varchar(255) NOT NULL,
                    url varchar(32) NOT NULL,
                    image varchar(255),
                    description text
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
        );
        $query->execute();
    }
}
