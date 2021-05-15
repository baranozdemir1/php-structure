<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Core\Bootstrap();

require __DIR__ . '/App/route.php';

$app->run();