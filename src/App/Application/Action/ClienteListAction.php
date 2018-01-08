<?php

namespace App\Application\Action;

use App\Domain\Persistence\ClienteRepositoryInterface;
use App\Domain\Persistence\EnderecoRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class ClienteListAction
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

    public function __construct(ClienteRepositoryInterface $clienteRepository, EnderecoRepositoryInterface $enderecoRepository, TemplateRendererInterface $template)
    {
        $this->clienteRepository = $clienteRepository;
        $this->enderecoRepository = $enderecoRepository;
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $clientList = $this->clienteRepository->findAll();
        return new HtmlResponse($this->template->render("app::cliente/list",['clienteList' => $clientList]));
    }

}