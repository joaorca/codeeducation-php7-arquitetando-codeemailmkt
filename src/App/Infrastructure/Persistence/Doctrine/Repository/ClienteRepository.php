<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Domain\Persistence\ClienteRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class ClienteRepository extends EntityRepository implements ClienteRepositoryInterface
{

    public function create($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function update($entity)
    {
        // TODO: Implement update() method.
    }

    public function remove($entity)
    {
        // TODO: Implement remove() method.
    }

}