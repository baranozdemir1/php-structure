<?php

function config($key): mixed
{

//    if (!empty($_ENV[$key])) {
//        $data = $_ENV[$key];
//    } else {
//        $data = $default;
//    }
//
//    $data = isset($_ENV[$key]) ?? $_ENV[$key] ? : $default;

    return $_ENV[$key];
}

function timeAgo($date): string
{
    return \Carbon\Carbon::parse($date)->diffForHumans();
}

function Auth()
{
    return \Core\Auth::getInstance();
}
