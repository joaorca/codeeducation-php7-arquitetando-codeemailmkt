<?php

namespace App\Application\Action\Factory;

use App\Application\Action\ClienteListAction;
use App\Domain\Persistence\ClienteRepositoryInterface;
use App\Domain\Persistence\EnderecoRepositoryInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClienteListFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $clienteRepository = $container->get(ClienteRepositoryInterface::class);
        $enderecoRepository = $container->get(EnderecoRepositoryInterface::class);
        return new ClienteListAction($clienteRepository, $enderecoRepository, $template);
    }

}