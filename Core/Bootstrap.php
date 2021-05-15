<?php

namespace Core;

use Buki\Router\Router;

class Bootstrap
{

    public $router;

    public function __construct()
    {
        $this->router = new Router([
            'paths' => [
                'controllers' => 'App/Controllers',
                'middlewares' => 'App/Middlewares'
            ],
            'namespaces' => [
                'controllers' => 'App\Controllers',
                'middlewares' => 'App\Middlewares'
            ]
        ]);
    }

    public function __destruct()
    {
        $this->router->run();
    }

}