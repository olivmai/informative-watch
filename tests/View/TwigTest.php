<?php

namespace Test\View;

require_once __DIR__ . '/../../config/config_test.php';

use App\View\Twig;
use PHPUnit\Framework\TestCase;

/**
 * Class TwigTest
 * @package Test\View
 * @covers \App\View\Twig
 */
class TwigTest extends TestCase
{
    private Twig $view;

    protected function setUp(): void
    {
        parent::setUp();
        $this->view = new Twig();
    }

    public function testRenderWhenTemplateExists(): void
    {
        self::assertIsString($this->view->render('homepage.html.twig'));
    }
}
