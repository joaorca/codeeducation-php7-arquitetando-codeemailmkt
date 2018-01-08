<?php

namespace App\Application\Middleware;

use App\Infrastructure\Bootstrap;
use Psr\Container\ContainerInterface;

class BootstrapMiddlewareFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = new Bootstrap();
        return new BootstrapMiddleware($bootstrap);
    }

}