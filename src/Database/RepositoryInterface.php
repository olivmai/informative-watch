<?php

namespace App\Database;

interface RepositoryInterface
{
    public function insert(array $data): void;
    public function getAll(): ?array;
    public function getOne(int $id);
    public function update(int $entityId, array $dataToUpdate);
    public function delete(int $id);
}
