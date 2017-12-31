<?php

# ./config/autoload/doctrine.global.php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'host' => 'DB_HOST',
                    'port' => 'DB_PORT',
                    'user' => 'DB_USER',
                    'password' => 'DB_PASSWORD',
                    'dbname' => 'DB_NAME',
                    'driverOptions' => [
                        //\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
                    ]
                ]
            ]
        ],
        'driver' => [
            'App_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../../src/App/Entity',
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'App\Entity' => 'App_driver'
                ]
            ]
        ]
    ]
];
