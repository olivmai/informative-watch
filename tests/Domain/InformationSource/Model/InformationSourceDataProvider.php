<?php

namespace Test\Domain\InformationSource\Model;

use App\Domain\InformationSource\Model\InformationSource;
use App\Domain\InformationSource\Model\InformationSourceFactory;
use Exception;

class InformationSourceDataProvider
{
    /**
     * @coversNothing
     * @return InformationSource
     * @throws Exception
     */
    public static function getOne(): InformationSource
    {
        return InformationSourceFactory::create([
            'id' => random_int(999, 9999),
            'title'=> 'Le tdd en php',
            'url' => 'https://youtu.be/cWyOA0iIqKc',
            'image' => 'lior-chamla.jpeg',
            'description' => 'Vidéo live coding de Lior Chamla',
        ]);
    }
}
