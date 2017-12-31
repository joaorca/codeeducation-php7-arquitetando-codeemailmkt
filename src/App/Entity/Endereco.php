<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="enderecos")
 */
class Endereco
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    public $cep;

    /**
     * @ORM\Column(type="string", length=120)
     */
    public $logradouro;

    /**
     * @ORM\Column(type="string", length=120)
     */
    public $cidade;

    /**
     * @ORM\Column(type="string", length=2)
     */
    public $estado;

}