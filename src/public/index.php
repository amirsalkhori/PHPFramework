<?php

require dirname(__DIR__).'/vendor/autoload.php';

use App\core\Application;

$app = new Application();

$app->router->get('/', function (){
    return 'Hello World';
});
$app->router->get('contact', function (){
    return 'Contact page';
});

$app->run();