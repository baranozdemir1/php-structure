<?php

namespace Core;

use Jenssegers\Blade\Blade;

class View
{

    public function show($view, $data)
    {
        $view_dir = dirname(__DIR__) . '/Public/views';
        $cache_dir = dirname(__DIR__) . '/Public/cache';

        $blade = new Blade($view_dir, $cache_dir);
        //return Blade::class->render($view, $data);
        return $blade->render($view, $data);
    }

}