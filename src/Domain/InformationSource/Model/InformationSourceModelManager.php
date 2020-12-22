<?php

namespace App\Domain\InformationSource\Model;

use App\Database\EntityInterface;
use App\Database\PdoClient;
use App\Database\RepositoryInterface;
use App\Domain\InformationSource\InformationSourceException;

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
        } catch (InformationSourceException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $source;
    }
}
