<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class EngineAsArgumentController
{
    public function __construct($template = 'index.html.twig')
    {
        $this->template = $template;
    }

    public function __invoke(EngineInterface $templating) // symfony >= 3.3
    {
        return new Response($templating->render($this->template));
    }
}
