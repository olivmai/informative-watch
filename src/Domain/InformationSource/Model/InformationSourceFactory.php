<?php

namespace App\Domain\InformationSource\Model;

class InformationSourceFactory
{
    public static function create(array $attributes): InformationSource
    {
        return new InformationSource(
            $attributes['title'],
            $attributes['url'],
            $attributes['image'],
            $attributes['description']
        );
    }
}
