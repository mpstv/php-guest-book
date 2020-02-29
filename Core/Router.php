<?php
namespace Core;

class Router
{
    protected $configuration;

    public function __construct()
    {
        $this->$configuration = Configuration::getInstance();
    }

    public function route($route)
    {
        $route = explode("/", $route);
        $controllerType = $route[1];
        $controllerMethod = $route[2];

        if (empty($controllerType)) {
            $controllerType = "home";
        }

        if (empty($controllerMethod)) {
            $controllerMethod = "index";
        }

        $controllerMethod = strtolower($controllerMethod);
        $controllerType = ucfirst(strtolower($controllerType));

        $class = '\\App\\Controllers\\' . $controllerType . $this->$configuration->getDefaultControllerPostfix();

        //Reflection API? DI?
        $instance = new $class();

        $instance->$controllerMethod();
    }
}
