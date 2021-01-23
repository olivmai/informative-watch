<?php

namespace App\Http;

interface ResponseInterface
{
    public function getContent(): string;
    public function getType(): string;
}
