<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */
class Cliente
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    public $nome;

    /**
     * @ORM\Column(type="string", length=120)
     */
    public $email;

    /**
     * @ORM\Column(type="string", length=11)
     */
    public $cpf;

    /**
     * @ORM\OneToMany(targetEntity="Endereco", mappedBy="cliente")
     */
    public $enderecos;

    public function __construct()
    {
        $this->enderecos = new ArrayCollection();
    }

}