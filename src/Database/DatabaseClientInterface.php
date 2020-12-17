<?php

namespace App\Database;

interface DatabaseClientInterface
{
    static function getInstance(): ?DatabaseClientInterface;
}
