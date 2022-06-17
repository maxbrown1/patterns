<?php

declare(strict_types=1);

use Slim\App;
use Psr\Container\ContainerInterface;

return static function (App $app, ContainerInterface $container): void {
    /** @psalm-var array{debug:bool} */
    $config = $container->get('config')['db'];

    ORM::configure([
        'connection_string' => "pgsql:host=" . $config['host'] . ";dbname=" . $config['name'] . "",
        'username' => $config['user'],
        'password' => $config['pass'],
    ]);
};
