<?php

require dirname(__DIR__).'/vendor/autoload.php';

use App\Core\Application;
use App\Controller\SiteAbstractController;
use App\Controller\AuthController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];


$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [new SiteAbstractController(), 'home']);
$app->router->get('/contact', 'contact');
$app->router->post('/contact', [new SiteAbstractController(), 'handleContact']);
$app->router->get('/contact', [new SiteAbstractController(), 'contact']);

$app->router->get('/login', [new AuthController(), 'login']);
$app->router->post('/login', [new AuthController(), 'login']);
$app->router->get('/register', [new AuthController(), 'register']);
$app->router->post('/register', [new AuthController(), 'register']);


$app->run();