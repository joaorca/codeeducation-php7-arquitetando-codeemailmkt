<?php

# ./config/autoload/doctrine.global.php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => Doctrine\DBAL\Driver\PDOSqlite\Driver::class,
                'params' => [
                    'path' => 'data/db/data.db',
                    'charset' => 'UTF8',
                ]
            ]
        ],
        'driver' => [
            'App_driver' => [
                'class' => Doctrine\ORM\Mapping\Driver\YamlDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../../src/App/Infrastructure/Persistence/Doctrine/ORM',
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'App\Domain\Entity' => 'App_driver'
                ]
            ]
        ]
    ]
];