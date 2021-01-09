<?php

namespace App\Domain\InformationSource\Controller;

use App\Domain\InformationSource\Model\ModelManagerInterface;
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

    public function __invoke(): string
    {
        $sources = $this->manager->findAll();
        return $this->view->render('homepage.html.twig', [
            'sources' => $sources
        ]);
    }
}
