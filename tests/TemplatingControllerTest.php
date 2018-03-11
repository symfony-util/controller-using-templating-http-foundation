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
use SymfonyUtil\Controller\TemplatingController;

class HomeTemplatingController extends TemplatingController // To test more in details
{
    const TEMPLATE = 'home.html.twig';
}

/**
 * @covers \SymfonyUtil\Controller\TemplatingController
 */
final class TemplatingControllerTest extends TestCase
{
    public function testCanBeCreated()
    {
        $this->assertInstanceOf(
            'SymfonyUtil\Controller\TemplatingController',
            new TemplatingController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(array('index.html.twig' => 'Hello World!'))),
                new TemplateNameParser()
            ))
        );
    }

    public function testHomeCanBeCreated()
    {
        $this->assertInstanceOf(
            'SymfonyUtil\Controller\TemplatingController',
            new HomeTemplatingController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(array('home.html.twig' => 'Hello World!'))),
                new TemplateNameParser()
            ))
        );
    }

    public function testEmptyReturnsResponse()
    {
        $this->assertInstanceOf(
            'Symfony\Component\HttpFoundation\Response',
            (new TemplatingController(new TwigEngine(
                new Twig_Environment(new Twig_Loader_Array(array('index.html.twig' => 'Hello World!'))),
                new TemplateNameParser()
            )))->__invoke()
        );
    }
}

// http://api.symfony.com/3.3/Symfony/Bridge/Twig/TwigEngine.html
// http://api.symfony.com/3.3/Symfony/Bundle/TwigBundle/TwigEngine.html
