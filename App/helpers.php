<?php

function config($key){

//    if (!empty($_ENV[$key])) {
//        $data = $_ENV[$key];
//    } else {
//        $data = $default;
//    }
//
//    $data = isset($_ENV[$key]) ?? $_ENV[$key] ? : $default;

    return $_ENV[$key];
}