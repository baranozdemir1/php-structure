<?php

namespace Core;

class Controller extends Bootstrap
{

    public function view($view, $data = []): string
    {
        return $this->view->show($view, $data);
    }

}