<?php

namespace App\Domain\InformationSource\Model;

class InformationSourceFactory
{
    public static function create(array $attributes): InformationSource
    {
        $source = new InformationSource(
            $attributes['title'],
            $attributes['url'],
            $attributes['image'],
            $attributes['description']
        );

        $source->setId($attributes['id']);

        return $source;
    }
}
