<?php


namespace App\Infrastructure\Persistence\Doctrine\Repository;


use App\Domain\Persistence\EnderecoRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\UnitOfWork;

class EnderecoRepository extends EntityRepository implements EnderecoRepositoryInterface
{

    public function create($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function update($entity)
    {
        if ($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) != UnitOfWork::STATE_MANAGED) {
            $this->getEntityManager()->merge($entity);
        }
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function remove($entity)
    {
        // TODO: Implement remove() method.
    }

}