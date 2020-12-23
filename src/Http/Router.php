<?php

namespace App\Http;

use App\Database\PdoClient;
use App\Domain\InformationSource\Controller\InformationSourceController;
use App\Domain\InformationSource\Model\InformationSourceModelManager;
use App\Domain\InformationSource\Model\InformationSourceRepository;
use App\View\ViewInterface;
use Exception;

class Router
{
    private ViewInterface $view;

    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    /**
     * @param RequestInterface $request
     * @throws Exception
     */
    public function handle(RequestInterface $request): void
    {
        switch ($request->getPath()) {
            default:
            case '/':
                $repo = new InformationSourceRepository(PdoClient::getInstance());
                $manager = new InformationSourceModelManager($repo);
                $sources = $manager->findAll();
                http_response_code(200);
                echo $this->view->render('homepage.html.twig', [
                    'sources' => $sources
                ]);

            case '/admin':
                http_response_code(200);
                echo $this->view->render('admin.html.twig');
            case '/new':
                http_response_code(200);
                echo $this->view->render('source/new.html.twig');
            case '/source/new':
                $repo = new InformationSourceRepository(PdoClient::getInstance());
                $manager = new InformationSourceModelManager($repo);
                (new InformationSourceController($manager))->addNewSource($request);
        }
    }
}
