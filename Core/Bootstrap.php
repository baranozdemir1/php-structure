<?php

namespace Core;

use Buki\Router\Router;
use Dotenv\Dotenv;
use Valitron\Validator;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Bootstrap
{
    public Router $router;
    protected View $view;
    public Validator $validator;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $variables = [
            'APP_DEBUG',
            'DB_HOST',
            'DB_NAME',
            'DB_USER',
            'DB_PASS'
        ];
        $dotenv->required($variables);


        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler());
        if ( config('APP_DEBUG') === "true" ){
            $whoops->register();
        }

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