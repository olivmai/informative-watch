<?php

namespace App\Database;

interface DatabaseClientInterface
{
    public static function getInstance(): ?DatabaseClientInterface;
}
