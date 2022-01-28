<?php


namespace App\Core;


class AbstractController
{
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}