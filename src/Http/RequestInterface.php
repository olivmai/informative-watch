<?php

namespace App\Http;

interface RequestInterface
{
    public function getParameters(): ?array;
    public function getMethod(): ?string;
    public function getPath(): ?string;
    public function setParameters(array $parameters): void;
    public function setMethod(?string $method): void;
    public function setPath(?string $path): void;
}
