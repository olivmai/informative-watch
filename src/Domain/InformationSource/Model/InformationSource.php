<?php

namespace App\Domain\InformationSource\Model;

use App\Database\EntityInterface;

class InformationSource implements EntityInterface
{
    private string $title;
    private string $url;
    private string $image;
    private string $description;

    public function __construct(string $title, string $url, string $image, string $description)
    {
        $this->title = $title;
        $this->url = $url;
        $this->image = $image;
        $this->description = $description;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'url' => $this->getUrl(),
            'image' => $this->getImage(),
            'description' => $this->getDescription(),
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
