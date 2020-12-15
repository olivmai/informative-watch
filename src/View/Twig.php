<?php

namespace App\View;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Twig
{
    /**
     * @param string $template
     * @param array $option
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public static function render(string $template, array $option = [])
    {
        $loader = new FilesystemLoader(TEMPLATES_DIR);
        $twig = new Environment($loader, []);

        return $twig->render($template, $option);
    }
}
