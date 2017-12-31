<?php


namespace App\Action;


use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TesteFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $templte = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        return new TesteAction($templte);
    }

}