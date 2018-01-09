<?php

namespace App\Application\Middleware;

use App\Domain\Service\FlashMessageInterface;
use App\Infrastructure\Bootstrap;
use Psr\Container\ContainerInterface;

class BootstrapMiddlewareFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = new Bootstrap();
        $flash = $container->get(FlashMessageInterface::class);
        return new BootstrapMiddleware($bootstrap, $flash);
    }

}