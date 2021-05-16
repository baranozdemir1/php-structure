<?php

namespace Core;

use Buki\Router\Router;
use Valitron\Validator;

class Bootstrap
{
    public Router $router;
    protected View $view;
    public Validator $validator;

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
        $this->validator = new Validator($_POST);
        Validator::langDir(dirname(__DIR__) . '/Public/lang');
        Validator::lang('tr_TR');
        $this->view = new View($this->validator);
    }

    public function run()
    {
        $this->router->run();
    }

}