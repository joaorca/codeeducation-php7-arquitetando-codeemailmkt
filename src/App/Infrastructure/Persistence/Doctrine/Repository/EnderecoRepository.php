<?php


namespace App\Infrastructure\Persistence\Doctrine\Repository;


use App\Domain\Persistence\EnderecoRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class EnderecoRepository extends EntityRepository implements EnderecoRepositoryInterface
{

    public function create($entity)
    {
        // TODO: Implement create() method.
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