<?php

namespace Core;

use Buki\Router\Router;

class Bootstrap
{
    public $view;
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
        $this->view = new View();
    }

    public function run()
    {
        $this->router->run();
    }

}