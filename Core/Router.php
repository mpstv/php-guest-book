<?php
namespace Core;

class Router
{
    protected $configuration;

    public function __construct()
    {
        $this->configuration = Configuration::getInstance();
    }

    public function route(string $route): void
    {
        $route = explode("/", $route);

        $controllerType = $this->tryGetValueFromRoute($route, 1, 'home');
        $controllerMethod = $this->tryGetValueFromRoute($route, 2, 'index');

        $controllerMethod = strtolower($controllerMethod);
        $controllerType = ucfirst(strtolower($controllerType));

        $class = '\\App\\Controllers\\' . $controllerType . $this->configuration->getDefaultControllerPostfix();

        //TODO: Reflection API? DI?
        $instance = new $class();

        $instance->$controllerMethod();
    }

    private function tryGetValueFromRoute($route, $index, $defaultValue)
    {
        if (array_key_exists($index, $route) && !empty($route[$index])) {
            return $route[$index];
        } else {
            return $defaultValue;
        }
    }
}
