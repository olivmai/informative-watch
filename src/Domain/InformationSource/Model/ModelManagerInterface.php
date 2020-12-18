<?php

namespace App\Domain\InformationSource\Model;

use App\Database\EntityInterface;

interface ModelManagerInterface
{
    public function save(EntityInterface $entity): EntityInterface;
}
