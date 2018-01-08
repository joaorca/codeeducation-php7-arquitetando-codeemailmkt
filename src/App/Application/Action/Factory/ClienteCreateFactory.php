<?php

namespace App\Application\Action\Factory;

use App\Application\Action\ClienteCreateAction;
use App\Domain\Persistence\ClienteRepositoryInterface;
use App\Domain\Persistence\EnderecoRepositoryInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClienteCreateFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $clienteRepository = $container->get(ClienteRepositoryInterface::class);
        $enderecoRepository = $container->get(EnderecoRepositoryInterface::class);
        $router = $container->get(RouterInterface::class);
        return new ClienteCreateAction($clienteRepository, $enderecoRepository, $template, $router);
    }

}