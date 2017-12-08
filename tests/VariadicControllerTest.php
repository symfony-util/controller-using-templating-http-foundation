<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\TemplateNameParser;
use SymfonyUtil\Controller\VariadicController;

/**
 * @covers \SymfonyUtil\Controller\VariadicController
 * @requires PHP 5.6.0
 */
final class VariadicControllerTest extends TestCase
{
    public function testCanBeCreated()
    {
        $this->assertInstanceOf(
            // VariadicController::class, // 5.4 < php (code is checked even if not executed!)
            'SymfonyUtil\Controller\VariadicController',
            new VariadicController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(['index.html.twig' => 'Hello World!'])),
                new TemplateNameParser()
            ))
        );
    }

    public function testEmptyReturnsResponse()
    {
        $this->assertInstanceOf(
            // Response::class, // 5.4 < php (code is checked even if not executed!)
            'Symfony\Component\HttpFoundation\Response',
            (new VariadicController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(['index.html.twig' => 'Hello World!'])),
                new TemplateNameParser()
            )))->__invoke()
        );
    }

    public function testArrayReturnsResponse()
    {
        $this->assertInstanceOf(
            // Response::class, // 5.4 < php (code is checked even if not executed!)
            'Symfony\Component\HttpFoundation\Response',
            (new VariadicController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array([
                    'index.html.twig' => '<ul>{% for item in 0 %}<li>{{ item }}</li>{% endfor %}</ul>',
                ])),
                new TemplateNameParser()
            )))->__invoke([
                'One',
                'Two',
                'Three',
            ])
        );
    }
}

// http://api.symfony.com/3.3/Symfony/Bridge/Twig/TwigEngine.html
// http://api.symfony.com/3.3/Symfony/Bundle/TwigBundle/TwigEngine.html
