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

class TemplatingController
{
    const TEMPLATE = 'index.html.twig';
    protected $templating;
    protected $template;

    public function __construct(EngineInterface $templating, $template = self::TEMPLATE)
    {
        $this->templating = $templating;
        $this->template = $template;
    }

    public function __invoke()
    {
        return new Response($this->templating->render($this->template));
    }
}
