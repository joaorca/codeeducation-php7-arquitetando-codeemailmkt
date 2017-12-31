<?php


namespace App\Entity;

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

}