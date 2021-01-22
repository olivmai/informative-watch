<?php

namespace App\Domain\InformationSource\Controller;

use App\Domain\InformationSource\Model\ModelManagerInterface;
use App\Http\Response;
use App\Http\ResponseInterface;
use App\View\ViewInterface;

class InformationSourceListController
{
    private ModelManagerInterface $manager;
    private ViewInterface $view;

    public function __construct(ModelManagerInterface $manager, ViewInterface $view)
    {
        $this->manager = $manager;
        $this->view = $view;
    }

    public function __invoke(): ResponseInterface
    {
        $sources = $this->manager->findAll();
        $template = $this->view->render('homepage.html.twig', [
            'sources' => $sources
        ]);

        return new Response('template', $template);
    }
}
