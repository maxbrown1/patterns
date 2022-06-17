<?php

declare(strict_types=1);

return [
    'config' => [
        'db' => [
            'adapter' => 'pgsql',
            'host' => getenv('DB_HOST'),
            'name' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASSWORD'),
            'port' => '5432',
            'charset' => 'utf8',
        ]
    ]
];
