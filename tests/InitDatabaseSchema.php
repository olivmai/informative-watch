<?php
 namespace Test;

use App\Database\PdoClient;
use App\Domain\InformationSource\InformationSourceException;
use Nelmio\Alice\Loader\NativeLoader;
use Nelmio\Alice\Throwable\LoadingThrowable;

trait InitDatabaseSchema
{
    /**
     * @throws InformationSourceException
     */
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
                    url varchar(255) NOT NULL,
                    image varchar(255),
                    description text
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
        );
        $createQuery->execute();
        $this->loadFixtures();
    }

    public function truncateTables(): void
    {
        $pdo = PdoClient::getInstance()->getConnexion();

        $truncateQuery = $pdo->prepare(
            "TRUNCATE TABLE sources"
        );

        $truncateQuery->execute();
    }

    /**
     * @throws InformationSourceException
     */
    private function loadFixtures(): void
    {
        FixturesLoader::load();
    }
}
