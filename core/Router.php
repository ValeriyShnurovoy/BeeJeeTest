<?php

namespace Core;

use App\Controllers\LoosController;

/**
 * Router
 */
final class Router
{
    /** @var array */
    protected $params = [];

    /** @var array */
    private $routes = [];

    /** @var   */
    private $httpHost;

    /** @var   */
    private $requestUri;

    /** @var  array */
    public $requestParams = [];


    public function __construct()
    {
        $this->setRoutes();
        $this->setServerParams();
    }

    /**
     * Starting the routing
     *
     * @throws \Exception
     */
    public function run()
    {
        if (array_key_exists($this->requestUri, $this->routes)) {
            $parser = new ControllerNameParser;
            $checkController = $parser->parse($this->routes[$this->requestUri]);
            if ($checkController) {

                $controller = $parser->getController();
                $contrObj = new $controller();
                $reflectionController = new \ReflectionClass($parser->getController());
                $method = $reflectionController->getMethod($parser->getActionName());
                $method->invokeArgs($contrObj, $this->requestParams);
            } else {
                throw new \Exception($parser->getErrorMessage());
            }

        } else {
            $loos = new LoosController();
            $loos->indexAction();
        }
    }

    /**
     * Set routes value form config
     */
    private function setRoutes():void
    {
        $this->routes = include APP_ABSOLUTE_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'Route.php';
    }

    private function setServerParams():void
    {
        $this->httpHost = $_SERVER['HTTP_HOST'];
        $this->requestUri = $_SERVER['REQUEST_URI'];
    }
}
