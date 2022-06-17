<?php

declare(strict_types=1);

use App\Http\Action\IndexAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app): void {
    $app->group('', function (RouteCollectorProxy $app) {
        $app->get('/', IndexAction::class);
    });
};
