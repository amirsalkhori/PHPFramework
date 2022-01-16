<?php

namespace app\core;

class Router
{
    protected array $routes = [];
    public function get($path, $callback)
    {
        echo $path;
    }

    public function resolve()
    {
        var_dump($_SERVER);
    }
}