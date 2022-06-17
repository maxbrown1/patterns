<?php

declare(strict_types=1);

use Slim\App;
use Psr\Container\ContainerInterface;

return static function (App $app, ContainerInterface $container): void {
    /** @psalm-var array{debug:bool} */
    $config = $container->get('config');

    /** @psalm-suppress InvalidArrayOffset */
    $app->addErrorMiddleware($config['debug'], $config['env'] !== 'test', true);
};
