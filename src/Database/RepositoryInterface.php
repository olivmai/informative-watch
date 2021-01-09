<?php

namespace App\Database;

interface RepositoryInterface
{
    public function insert(EntityInterface $entity): int;
    public function findAll(): array;

    public function find(int $id): ?EntityInterface;
    public function delete(?int $id): int;
}
