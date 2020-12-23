<?php

namespace App\Http;

use App\View\ViewInterface;

class Router
{
    private ViewInterface $view;

    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    /**
     * @param RequestInterface $request
     */
    public function handle(RequestInterface $request): void
    {
        switch ($request->getPath()) {
            default:
            case '/':
                http_response_code(200);
                echo $this->view->render('homepage.html.twig');
                // no break
            case '/admin':
                http_response_code(200);
                echo $this->view->render('admin.html.twig');
        }
    }
}
