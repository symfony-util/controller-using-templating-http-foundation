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
use SymfonyUtil\Controller\EngineInConstructorController;

/**
 * @covers \SymfonyUtil\Controller\EngineInConstructorController
 */
final class EngineInConstructorControllerTest extends TestCase
{
    public function testCanBeCreated()
    {
        $this->assertInstanceOf(
            // EngineInConstructorController::class, // 5.4 < php
            'SymfonyUtil\Controller\EngineInConstructorController',
            new EngineInConstructorController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(['index.html.twig' => 'Hello World!'])),
                new TemplateNameParser()
            ))
        );
    }

    public function testReturnsResponse()
    {
        $this->assertInstanceOf(
            // Response::class, // 5.4 < php
            'Symfony\Component\HttpFoundation\Response',
            (new EngineInConstructorController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(['index.html.twig' => 'Hello World!'])),
                new TemplateNameParser()
            )))->__invoke()
        );
    }
}

// http://api.symfony.com/3.3/Symfony/Bridge/Twig/TwigEngine.html
// http://api.symfony.com/3.3/Symfony/Bundle/TwigBundle/TwigEngine.html
