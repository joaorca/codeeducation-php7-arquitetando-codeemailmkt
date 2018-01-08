<?php

namespace App\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Cliente
{
    public $id;

    public $nome;

    public $email;

    public $cpf;

    public $enderecos;

    public function __construct()
    {
        $this->enderecos = new ArrayCollection();
    }

}