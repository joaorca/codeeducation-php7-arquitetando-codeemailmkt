<?php

namespace App\Infrastructure;

use App\Domain\Service\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    public function create()
    {
        require 'config/doctrine.php';
    }

}