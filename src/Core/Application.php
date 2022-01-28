<?php

namespace App\Core;

use \App\Core\AbstractController;

class Application
{

    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public AbstractController $abstractController;
    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        $this->router->resolve();
    }

    /**
     * @return AbstractController
     */
    public function getAbstractController(): AbstractController
    {
        return $this->abstractController;
    }

    /**
     * @param AbstractController $abstractController
     */
    public function setAbstractController(AbstractController $abstractController): void
    {
        $this->abstractController = $abstractController;
    }
}