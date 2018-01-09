<?php

namespace App\Infrastructure\Service;

use Aura\Session\Session;
use Psr\Container\ContainerInterface;

class FlashMessageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $session = $container->get(Session::class);
        return new FlashMessage($session);
    }
}