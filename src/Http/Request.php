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

    /**
     * @param array $parameters
     * @codeCoverageIgnore
     */
    public function setParameters(array $parameters = []): void
    {
        $this->parameters = $parameters;
    }

    /**
     * @param string|null $method
     * @codeCoverageIgnore
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    /**
     * @param string|null $path
     * @codeCoverageIgnore
     */
    public function setPath(?string $path): void
    {
        $this->path = $path;
    }
}
