<?php

namespace App\Domain\InformationSource\Model;

use App\Database\EntityInterface;
use App\Database\RepositoryInterface;
use App\Domain\InformationSource\InformationSourceException;
use Exception;

class InformationSourceModelManager implements ModelManagerInterface
{
    private RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param EntityInterface|InformationSource $source
     * @return EntityInterface|InformationSource
     * @throws InformationSourceException
     */
    public function save(EntityInterface $source): EntityInterface
    {
        try {
            $id = $this->repository->insert($source);
            $source->setId($id);
        } catch (Exception $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $source;
    }

    /**
     * @param EntityInterface $source
     * @return int
     * @throws InformationSourceException
     */
    public function delete(EntityInterface $source): int
    {
        try {
            $id = $this->repository->delete($source->getId());
        } catch (Exception $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $id;
    }

    /**
     * @param int $id
     * @return EntityInterface|null
     * @throws InformationSourceException
     */
    public function find(int $id): ?EntityInterface
    {
        return $this->repository->find($id);
    }

    public function findAll(): array
    {
        $sources = [];
        $results = $this->repository->findAll();
        foreach ($results as $source) {
            $sources[] = InformationSourceFactory::create($source);
        }

        return $sources;
    }
}
