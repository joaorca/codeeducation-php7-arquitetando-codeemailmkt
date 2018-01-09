<?php

namespace App\Application\Action;

use App\Domain\Persistence\ClienteRepositoryInterface;
use App\Domain\Persistence\EnderecoRepositoryInterface;
use App\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClienteDeleteAction
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
        $id = $request->getAttribute("id");
        $cliente = $this->clienteRepository->find($id);

        if ($request->getMethod() == 'POST') {
            $this->clienteRepository->remove($cliente);

            /** @var FlashMessageInterface $flash */
            $flash = $request->getAttribute("flash");
            $flash->setMessage("success", "Cliente deletado com sucesso");

            $uri = $this->router->generateUri("cliente.list");
            return new RedirectResponse($uri);
        }

        return new HtmlResponse($this->template->render("app::cliente/delete", ['cliente' => $cliente]));
    }

}