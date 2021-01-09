<?php

namespace App\Domain\InformationSource\Model;

use App\Database\EntityInterface;

interface ModelManagerInterface
{
    public function save(EntityInterface $entity): EntityInterface;
    public function delete(EntityInterface $source): int;
    public function find(int $id): ?EntityInterface;
    public function findAll(): array;
}
