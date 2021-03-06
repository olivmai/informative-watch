<?php

namespace App\Domain\InformationSource\Controller;

use App\Domain\InformationSource\Model\InformationSourceFactory;
use App\Domain\InformationSource\Model\ModelManagerInterface;
use App\Http\RequestInterface;
use App\Http\Response;
use App\Http\ResponseInterface;
use App\Tools\FileUploader;
use Exception;

class InformationSourceController
{
    protected ModelManagerInterface $sourceManager;

    public function __construct(ModelManagerInterface $manager)
    {
        $this->sourceManager = $manager;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws Exception
     */
    public function addNewSource(RequestInterface $request): ResponseInterface
    {
        $params = $request->getParameters() ?: [];

        if (!array_key_exists('image', $params)) {
            throw new Exception('No file found for upload');
        }

        $file = $params['image'];

        if (null === $fileName = FileUploader::upload($file)) {
            throw new Exception('An error occured while trying to upload new file');
        }

        $newSource = InformationSourceFactory::create([
            'id' => random_int(1, 999),
            'title' => $params['title'],
            'url' => $params['url'],
            'image' => $fileName,
            'description' => $params['description'],
        ]);

        $this->sourceManager->save($newSource);

        return new Response('redirect', 'Location: ' . APP_ROOT_URL);
    }
}
