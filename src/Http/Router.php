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
     * @return string
     */
    public function handle(RequestInterface $request): string
    {
        switch ($request->getPath()) {
            default:
            case '/':
                http_response_code(200);
                return $this->view->render('homepage.html.twig');
            case '/admin':
                http_response_code(200);
                return $this->view->render('admin.html.twig');
        }
    }
}
