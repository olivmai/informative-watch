<?php

namespace App\Domain\InformationSource\Model;

use App\Database\PdoClient;
use App\Domain\InformationSource\InformationSourceException;
use PDO;
use PDOException;

class InformationSourceRepository
{
    private PdoClient $dbClient;

    public function __construct(PdoClient $dbClient)
    {
        $this->dbClient = $dbClient;
    }

    /**
     * @param InformationSource $informationSource
     * @return int
     * @throws InformationSourceException
     */
    public function insert(InformationSource $informationSource): int
    {
        $data = $informationSource->toArray();

        try {
            $stmt = $this->dbClient->getConnexion()->prepare("INSERT INTO sources (title, url, image, description) VALUES (:title, :url, :image, :description)");

            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':url', $data['url'], PDO::PARAM_STR);
            $stmt->bindParam(':image', $data['image'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $data['description'], PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return (int)$this->dbClient->getConnexion()->lastInsertId();
    }

    /**
     * @return array|null
     * @throws InformationSourceException
     */
    public function getAll(): ?array
    {
        try {
            $stmt = $this->dbClient->getConnexion()->prepare("SELECT * FROM sources");
            $stmt->execute();
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * @param int $id
     * @return InformationSource|null
     * @throws InformationSourceException
     */
    public function getOne(int $id): ?InformationSource
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
     * @throws InformationSourceException
     */
    public function delete(int $id): void
    {
        try {
            $stmt = $this->dbClient->getConnexion()->prepare("DELETE FROM sources WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }
    }
}
