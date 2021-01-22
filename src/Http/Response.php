<?php

namespace App\Http;

class Response implements ResponseInterface
{
    private string $content;
    private string $type;

    public function __construct(string $responseType, string $responseContent)
    {
        $this->type = $responseType;
        $this->content = $responseContent;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
