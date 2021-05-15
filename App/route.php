<?php
use Buki\Router\Router;

$app = new \Core\Bootstrap();

$app->router->controller('/', 'Home');

$app->router->get('/user/:slug?/:id?', function ($user = null, $id = null){
    return 'user page ' . $user . ' ' . $id;
});

$app->router->group('/admin', function ($router){

    $router->get('/', function (){
        return 'Admin home page';
    });

    $router->get('/users', function (){
        return 'Admin users page';
    });

});

$app->router->error(function (){
    $error_html = '<h3 style="text-align: center">Sayfa bulunamadı</h3>';

    echo $error_html;
});