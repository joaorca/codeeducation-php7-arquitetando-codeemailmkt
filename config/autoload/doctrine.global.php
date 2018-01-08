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
        ]
    ]
];