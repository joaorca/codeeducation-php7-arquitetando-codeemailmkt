<?php

namespace App\Application\Action;

use App\Domain\Persistence\ClienteRepositoryInterface;
use App\Domain\Persistence\EnderecoRepositoryInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TesteFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $ClienteRepository = $container->get(ClienteRepositoryInterface::class);
        $EnderecoRepository = $container->get(EnderecoRepositoryInterface::class);
        return new TesteAction($ClienteRepository, $EnderecoRepository, $template);
    }

}