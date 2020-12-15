<?php

namespace App\View;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class Twig implements ViewInterface
{
    /**
     * @param string $template
     * @param array $options
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $template, array $options = []): string
    {
        $loader = new FilesystemLoader(TEMPLATES_DIR);
        $twig = new Environment($loader, []);

        return $twig->render($template, $options);
    }
}
