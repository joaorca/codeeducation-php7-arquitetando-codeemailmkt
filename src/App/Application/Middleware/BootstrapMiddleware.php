<?php

namespace App\Application\Middleware;

use App\Domain\Service\BootstrapInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BootstrapMiddleware
{

    /**
     * @var BootstrapInterface
     */
    private $bootstrap;

    public function __construct(BootstrapInterface $bootstrap)
    {
        $this->bootstrap = $bootstrap;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $this->bootstrap->create();
        return $next($request, $response);
    }

}