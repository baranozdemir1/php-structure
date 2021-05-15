<?php

namespace App\Controllers;

use App\Middlewares\CheckAuth;
use Core\Controller;

class Home extends Controller
{

    public $middlewareBefore = [
        CheckAuth::class
    ];

    public function main()
    {
        $name = 'Baran';
        $surname = 'Özdemir';
        return $this->view('home', compact('name', 'surname'));
    }

}