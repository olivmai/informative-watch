<?php

namespace App\Http;

use App\View\Twig;
use Exception;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Router
{
    /**
     * @param RequestInterface $request
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws Exception
     */
    public static function handle(RequestInterface $request): string
    {
        switch($request->getPath()) {
            default;
            case '/':
                http_response_code(200);
                echo Twig::render('homepage.html.twig');
                break;
            case '/admin':
                http_response_code(200);
                echo Twig::render('admin.html.twig');
                break;
        }
    }
}
