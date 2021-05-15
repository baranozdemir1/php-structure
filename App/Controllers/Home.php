<?php

namespace App\Controllers;

use App\Middlewares\CheckAuth;

class Home
{

    public $middlewareBefore = [
        CheckAuth::class
    ];

    public function main()
    {
        return 'index methodu';
    }

}