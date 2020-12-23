<?php

namespace App\Database;

interface RepositoryInterface
{
    public function insert(EntityInterface $entity): int;

    public function findAll(): array;
}
