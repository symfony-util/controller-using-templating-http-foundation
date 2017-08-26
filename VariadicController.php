<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SymfonyUtil\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class VariadicController
{
    protected $templating;
    protected $template;

    public function __construct(EngineInterface $templating, $template = 'index.html.twig')
    {
        $this->templating = $templating;
        $this->template = $template;
    }

    public function __invoke(...$arguments) // PHP 5.6+, apparently not supported when empty by Symfony 3.3.6 ArgumentResolver
    {
        dump($arguments);

        return new Response($this->templating->render($this->template, $arguments));
    }
}
