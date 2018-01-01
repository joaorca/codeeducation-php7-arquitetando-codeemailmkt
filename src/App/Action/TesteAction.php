<?php


namespace App\Action;

use App\Entity\Cliente;
use App\Entity\Endereco;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class TesteAction
{

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var EntityManager
     */
    private $manager;

    public function __construct(EntityManager $manager, TemplateRendererInterface $template)
    {
        $this->template = $template;
        $this->manager = $manager;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        //$this->down(); $this->up();

        $clientList = $this->getList(Cliente::class);
        $enderecoList = $this->getList(Endereco::class);

        return new HtmlResponse($this->template->render('app::teste',
            ['clientes' => $clientList, 'enderecos' => $enderecoList]));
    }

    private function getList($entityName)
    {
        return $this->manager->getRepository($entityName)->findAll();
    }

    private function down()
    {

        $enderecos = $this->manager->getRepository(Endereco::class)->findAll();
        foreach ($enderecos as $endereco) {
            $this->manager->remove($endereco);
        }

        $clientes = $this->manager->getRepository(Cliente::class)->findAll();
        foreach ($clientes as $cliente) {
            $this->manager->remove($cliente);
        }

        $this->manager->flush();
    }

    private function up()
    {

        $cliente1 = new Cliente();
        $cliente1->nome = "Geralt of Rivia";
        $cliente1->email = "geralt@cdprojektred.com";
        $cliente1->cpf = "10509945074";
        $this->manager->persist($cliente1);

        $endereco1 = new Endereco();
        $endereco1->cep = "20770130";
        $endereco1->logradouro = "Av Pomar Branco, Tenda 4";
        $endereco1->cidade = "Pomar Branco";
        $endereco1->estado = "PB";
        $endereco1->cliente = $cliente1;
        $this->manager->persist($endereco1);

        $endereco2 = new Endereco();
        $endereco2->cep = "12345123";
        $endereco2->logradouro = "Av das Larangeiras, 33";
        $endereco2->cidade = "Pomar Branco";
        $endereco2->estado = "PB";
        $endereco2->cliente = $cliente1;
        $this->manager->persist($endereco2);

        $cliente2 = new Cliente();
        $cliente2->nome = "Cirilla";
        $cliente2->email = "cirilla@cdprojektred.com";
        $cliente2->cpf = "94733254016";
        $this->manager->persist($cliente2);

        $cliente3 = new Cliente();
        $cliente3->nome = "Yennefer of Vengerberg";
        $cliente3->email = "yennefer@cdprojektred.com";
        $cliente3->cpf = "06118994005";
        $this->manager->persist($cliente3);

        $endereco3 = new Endereco();
        $endereco3->cep = "45678456";
        $endereco3->logradouro = "Bosque das Oliveiras, 456";
        $endereco3->cidade = "Pomar Branco";
        $endereco3->estado = "PB";
        $endereco3->cliente = $cliente3;
        $this->manager->persist($endereco3);

        $cliente4 = new Cliente();
        $cliente4->nome = "Triss Merigold";
        $cliente4->email = "triss@cdprojektred.com";
        $cliente4->cpf = "00396299024";
        $this->manager->persist($cliente4);

        $cliente5 = new Cliente();
        $cliente5->nome = "Keira Metz";
        $cliente5->email = "keira@cdprojektred.com";
        $cliente5->cpf = "49314686086";
        $this->manager->persist($cliente5);

        $cliente6 = new Cliente();
        $cliente6->nome = "Vesemir";
        $cliente6->email = "vesemir@cdprojektred.com";
        $cliente6->cpf = "31853520098";
        $this->manager->persist($cliente6);

        $this->manager->flush();

    }


}