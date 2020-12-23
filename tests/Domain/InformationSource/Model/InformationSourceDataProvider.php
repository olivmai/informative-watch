<?php

namespace Test\Domain\InformationSource\Model;

use App\Domain\InformationSource\Model\InformationSource;
use App\Domain\InformationSource\Model\InformationSourceFactory;

class InformationSourceDataProvider
{
    public static function getOne(): InformationSource
    {
        return InformationSourceFactory::create([
            'id' => null,
            'title'=> 'Le tdd en php',
            'url' => 'https://youtu.be/cWyOA0iIqKc',
            'image' => 'lior-chamla.jpeg',
            'description' => 'Vidéo live coding de Lior Chamla',
            'error' => 'bug',
        ]);
    }
}
