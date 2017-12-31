<?php


namespace App\Action;


use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TesteFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $templte = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;

        $manager = $container->get(EntityManager::class);

        return new TesteAction($manager, $templte);
    }

}