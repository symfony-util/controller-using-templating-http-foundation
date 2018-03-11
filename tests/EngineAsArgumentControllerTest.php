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
use Symfony\Component\Templating\TemplateNameParser;
use SymfonyUtil\Controller\EngineAsArgumentController;

/**
 * @covers \SymfonyUtil\Controller\EngineAsArgumentController
 */
final class EngineAsArgumentControllerTest extends TestCase
{
    public function testCanBeCreated()
    {
        $this->assertInstanceOf(
            'SymfonyUtil\Controller\EngineAsArgumentController',
            new EngineAsArgumentController()
        );
    }

    public function testReturnsResponse()
    {
        $engine = new EngineAsArgumentController();
        $this->assertInstanceOf(
            'Symfony\Component\HttpFoundation\Response',
            $engine->__invoke(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(array('index.html.twig' => 'Hello World!'))),
                new TemplateNameParser()
            ))
        );
    }
}

// http://api.symfony.com/3.3/Symfony/Bridge/Twig/TwigEngine.html
// http://api.symfony.com/3.3/Symfony/Bundle/TwigBundle/TwigEngine.html
