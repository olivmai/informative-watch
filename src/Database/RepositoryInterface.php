<?php

namespace App\Database;

interface RepositoryInterface
{
    public function insert(array $data): void;
    public function getAll(): ?array;
    public function getOne(int $id): ?EntityInterface;
    public function update(int $entityId, array $dataToUpdate): void;
    public function delete(int $id): void;
}
