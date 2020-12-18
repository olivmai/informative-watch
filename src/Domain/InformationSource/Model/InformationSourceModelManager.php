<?php

namespace App\Domain\InformationSource\Model;

use App\Database\EntityInterface;
use App\Database\PdoClient;
use App\Domain\InformationSource\InformationSourceException;

class InformationSourceModelManager implements ModelManagerInterface
{
    private InformationSourceRepository $sourceRepository;

    public function __construct()
    {
        $this->sourceRepository = new InformationSourceRepository(PdoClient::getInstance());
    }

    /**
     * @param EntityInterface|InformationSource $source
     * @return EntityInterface|InformationSource
     * @throws InformationSourceException
     */
    public function save(EntityInterface $source): EntityInterface
    {
        try {
            $id = $this->sourceRepository->insert($source);
            $source->setId($id);
        } catch (InformationSourceException $exception) {
            throw new InformationSourceException($exception->getMessage());
        }

        return $source;
    }
}
