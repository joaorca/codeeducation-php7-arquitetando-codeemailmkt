<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Entity\Endereco;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class EnderecoRepositoryFactory
{

    public function __invoke(ContainerInterface $container)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Endereco::class);
    }

}