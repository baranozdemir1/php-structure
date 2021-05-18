<?php

namespace App\Middlewares;

class CheckAuth
{

    public function handle()
    {
        if (auth()->isLoggedIn()){
            header( 'Location:' . ($_SERVER['HTTP_REFERER'] ?? 'http://localhost:8888/structure'));
            exit();
        }
        return true;
    }

}