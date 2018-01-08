<?php

namespace App\Application\Action;

use App\Domain\Entity\Cliente;
use App\Domain\Persistence\ClienteRepositoryInterface;
use App\Domain\Persistence\EnderecoRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClienteCreateAction
{

    /**
     * @var ClienteRepositoryInterface
     */
    private $clienteRepository;
    /**
     * @var EnderecoRepositoryInterface
     */
    private $enderecoRepository;
    /**
     * @var TemplateRendererInterface
     */
    private $template;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(ClienteRepositoryInterface $clienteRepository, EnderecoRepositoryInterface $enderecoRepository, TemplateRendererInterface $template, RouterInterface $router)
    {
        $this->clienteRepository = $clienteRepository;
        $this->enderecoRepository = $enderecoRepository;
        $this->template = $template;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $cliente = new Cliente();
            $cliente->nome = $data["nome"];
            $cliente->email = $data["email"];
            $cliente->cpf = $data["cpf"];
            $this->clienteRepository->create($cliente);

            $uri = $this->router->generateUri("cliente.list");
            return new RedirectResponse($uri);
        }

        return new HtmlResponse($this->template->render("app::cliente/create"));
    }

}