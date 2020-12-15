<?php

namespace App\Http;

class Request implements RequestInterface
{
    private ?string $path;
    private ?string $method;
    private array $parameters;

    public function __construct(array $request = [])
    {
        $this->path = $request['path'] ?: '/';
        $this->method = $request['method'] ?: 'GET';
        $this->parameters = $request['parameters'] ?: [];
    }

    public function getParameters(): ?array
    {
        return $this->parameters;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setParameters(array $parameters = []): void
    {
        $this->parameters = $parameters;
    }

    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }
}
