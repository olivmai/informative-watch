<?php

namespace App\Domain\InformationSource\Model;

use App\Database\EntityInterface;
use App\Database\PdoClient;
use App\Database\RepositoryInterface;
use App\Domain\InformationSource\InformationSourceException;
use PDO;
use PDOException;

class InformationSourceRepository implements RepositoryInterface
{
    private PdoClient $dbClient;

    public function __construct(PdoClient $dbClient)
    {
        $this->dbClient = $dbClient;
    }

    /**
     * @param EntityInterface|InformationSource $informationSource
     * @return int
     * @throws InformationSourceException
     */
    public function insert(EntityInterface $informationSource): int
    {
        $data = $informationSource->toArray();

        try {
            $stmt = $this->dbClient->getConnexion()->prepare("INSERT INTO sources (title, url, image, description) VALUES (:title, :url, :image, :description)");

            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':url', $data['url']);
            $stmt->bindParam(':image', $data['image']);
            $stmt->bindParam(':description', $data['description']);

            $stmt->execute();
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return (int)$this->dbClient->getConnexion()->lastInsertId();
    }

    /**
     * @return array
     * @throws InformationSourceException
     */
    public function findAll(): array
    {
        try {
            $stmt = $this->dbClient->getConnexion()->prepare("SELECT * FROM sources");
            $stmt->execute();
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @param int $id
     * @return InformationSource|null
     * @throws InformationSourceException
     */
    public function find(int $id): ?InformationSource
    {
        try {
            $stmt = $this->dbClient->getConnexion()->prepare("SELECT * FROM sources WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $sourceArrayData = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return ($sourceArrayData) ? InformationSourceFactory::create($sourceArrayData) : null;
    }

    /**
     * @param int $entityId
     * @param array $dataToUpdate
     * @return int
     * @throws InformationSourceException
     */
    public function update(int $entityId, array $dataToUpdate): int
    {
        $params = " ";
        foreach ($dataToUpdate as $paramKey => $paramNewValue) {
            $params .= $paramKey . "=:" . $paramKey . " ";
        }
        $sql = "UPDATE sources SET" . $params . "WHERE id=:id";

        try {
            $stmt = $this->dbClient->getConnexion()->prepare($sql);
            $stmt->bindParam(':id', $entityId);
            foreach ($dataToUpdate as $paramKey => $paramNewValue) {
                $stmt->bindParam(":" . $paramKey, $paramNewValue);
            }
            $stmt->execute();
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $entityId;
    }

    /**
     * @param int $id
     * @return int
     * @throws InformationSourceException
     */
    public function delete(?int $id): int
    {
        if (null === $id) {
            throw new InformationSourceException('No id found for source removing');
        }

        try {
            $stmt = $this->dbClient->getConnexion()->prepare("DELETE FROM sources WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $id;
    }
}
