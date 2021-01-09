<?php

namespace App\Database;

interface EntityInterface
{
    public function setId(int $id): void;

    public function getId(): int;

    public function toArray(): array;
}
