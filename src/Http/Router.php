<?php

namespace App\Http;

use App\Database\PdoClient;
use App\Domain\InformationSource\Controller\InformationSourceController;
use App\Domain\InformationSource\Controller\InformationSourceListController;
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
     * @return ResponseInterface
     * @throws Exception
     */
    public function handle(RequestInterface $request): ResponseInterface
    {
        switch ($request->getPath()) {
            default:
            case '/':
                $repo = new InformationSourceRepository(PdoClient::getInstance());
                $manager = new InformationSourceModelManager($repo);
                $listController = new InformationSourceListController($manager, $this->view);
                http_response_code(200);
                return $listController();
            case '/admin':
                http_response_code(200);
                return new Response('template', $this->view->render('admin.html.twig'));
            case '/new':
                http_response_code(200);
                return new Response('template', $this->view->render('source/new.html.twig'));
            case '/source/new':
                $repo = new InformationSourceRepository(PdoClient::getInstance());
                $manager = new InformationSourceModelManager($repo);
                return (new InformationSourceController($manager))->addNewSource($request);
        }
    }

    public function handleResponse(ResponseInterface $response): void
    {
        if ('template' === $response->getType()) {
            echo $response->getContent();
        }
        if ('redirect' === $response->getType()) {
            header($response->getContent());
            exit();
        }
    }
}
