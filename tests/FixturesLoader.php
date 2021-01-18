<?php

namespace Test;


use App\Database\PdoClient;
use App\Domain\InformationSource\InformationSourceException;
use App\Domain\InformationSource\Model\InformationSource;
use App\Domain\InformationSource\Model\InformationSourceFactory;
use App\Domain\InformationSource\Model\InformationSourceModelManager;
use App\Domain\InformationSource\Model\InformationSourceRepository;
use Faker\Factory;

/**
 * @method static string url()
 */
class FixturesLoader
{
    /**
     * @throws InformationSourceException
     */
    public static function load(): void
    {
        $faker = Factory::create();
        $sources = [];
        for ($i = 0; $i <= 5; $i++) {
            $sources[] = InformationSourceFactory::create([
                'id' => $faker->randomNumber(5),
                'title' => $faker->text(100),
                // need to ignore because of Faker magic methodsœ
                /* @phpstan-ignore-next-line */
                'url' => substr($faker->url(), 0, 50),
                'image' => $faker->imageUrl(300, 200),
                'description' => $faker->text(500),
            ]);
        }

        $modelManager = new InformationSourceModelManager(new InformationSourceRepository(PdoClient::getInstance()));
        /** @var InformationSource $source */
        foreach ($sources as $source) {
            $modelManager->save($source);
        }
    }
}
