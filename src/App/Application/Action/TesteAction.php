<?php

namespace App\Application\Action;

use App\Domain\Entity\Cliente;
use App\Domain\Entity\Endereco;
use App\Domain\Persistence\ClienteRepositoryInterface;
use App\Domain\Persistence\EnderecoRepositoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class TesteAction
{

    /**
     * @var ClienteRepositoryInterface
     */
    private $clienteRepository;
    /**
     * @var TemplateRendererInterface
     */
    private $template;
    /**
     * @var EnderecoRepositoryInterface
     */
    private $enderecoRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository, EnderecoRepositoryInterface $enderecoRepository, TemplateRendererInterface $template = null)
    {
        $this->clienteRepository = $clienteRepository;
        $this->template = $template;
        $this->enderecoRepository = $enderecoRepository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        //$this->up();
        $clientList = $this->clienteRepository->findAll();
        return new HtmlResponse($this->template->render("app::cliente/list",['clienteList' => $clientList]));
    }

    private function up()
    {

        $cliente1 = new Cliente();
        $cliente1->nome = "Geralt of Rivia";
        $cliente1->email = "geralt@cdprojektred.com";
        $cliente1->cpf = "10509945074";
        $this->clienteRepository->create($cliente1);

        $cliente2 = new Cliente();
        $cliente2->nome = "Cirilla";
        $cliente2->email = "cirilla@cdprojektred.com";
        $cliente2->cpf = "94733254016";
        $this->clienteRepository->create($cliente2);

        $cliente3 = new Cliente();
        $cliente3->nome = "Yennefer of Vengerberg";
        $cliente3->email = "yennefer@cdprojektred.com";
        $cliente3->cpf = "06118994005";
        $this->clienteRepository->create($cliente3);

        $cliente4 = new Cliente();
        $cliente4->nome = "Triss Merigold";
        $cliente4->email = "triss@cdprojektred.com";
        $cliente4->cpf = "00396299024";
        $this->clienteRepository->create($cliente4);

        $cliente5 = new Cliente();
        $cliente5->nome = "Keira Metz";
        $cliente5->email = "keira@cdprojektred.com";
        $cliente5->cpf = "49314686086";
        $this->clienteRepository->create($cliente5);

        $cliente6 = new Cliente();
        $cliente6->nome = "Vesemir";
        $cliente6->email = "vesemir@cdprojektred.com";
        $cliente6->cpf = "31853520098";
        $this->clienteRepository->create($cliente6);

        $endereco1 = new Endereco();
        $endereco1->cep = "20770130";
        $endereco1->logradouro = "Av Pomar Branco, Tenda 4";
        $endereco1->cidade = "Pomar Branco";
        $endereco1->estado = "PB";
        $endereco1->cliente = $cliente1;
        $this->enderecoRepository->create($endereco1);

        $endereco2 = new Endereco();
        $endereco2->cep = "12345123";
        $endereco2->logradouro = "Av das Larangeiras, 33";
        $endereco2->cidade = "Pomar Branco";
        $endereco2->estado = "PB";
        $endereco2->cliente = $cliente1;
        $this->enderecoRepository->create($endereco2);

        $endereco3 = new Endereco();
        $endereco3->cep = "45678456";
        $endereco3->logradouro = "Bosque das Oliveiras, 456";
        $endereco3->cidade = "Pomar Branco";
        $endereco3->estado = "PB";
        $endereco3->cliente = $cliente3;
        $this->enderecoRepository->create($endereco3);

    }

}