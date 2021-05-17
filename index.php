<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

$app = new \Core\Bootstrap();

date_default_timezone_set(config('APP_TIMEZONE'));

require __DIR__ . '/App/route.php';

$app->run();