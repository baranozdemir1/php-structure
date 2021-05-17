<?php

namespace Core;

use Buki\Router\Router;
use Carbon\Carbon;
use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;
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
        /*
         * .env install
         */
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

        /*
         * error reporting install
         */
        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler());
        if ( config('APP_DEBUG') === "true" ){
            $whoops->register();
        }

        Carbon::setLocale(config('APP_LOCALE'));

        /*
         * database install
         */

        $capsule = new Capsule();
        $capsule->addConnection([
            'driver'    => config('DB_DRIVER'),
            'host'      => config('DB_HOST'),
            'database'  => config('DB_NAME'),
            'username'  => config('DB_USER'),
            'password'  => config('DB_PASS'),
            'charset'   => config('DB_CHARSET'),
            'collation' => config('DB_COLLATION'),
            'prefix'    => config('DB_PREFIX')
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

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
        Validator::lang(config('APP_LOCALE'));
        $this->view = new View($this->validator);
    }

    public function run()
    {
        $this->router->run();
    }


}