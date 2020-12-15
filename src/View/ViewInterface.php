<?php

namespace App\View;

interface ViewInterface
{
    public function render(string $template, array $options = []): string;
}
