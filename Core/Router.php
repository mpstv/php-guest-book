<?php
namespace Core;

class Router
{
    protected $configuration;

    public function __construct()
    {
        $this->configuration = Injector::getInstance()->createInstance(new \ReflectionClass(Configuration::class));
    }

    public function route(string $route): void
    {
        $route = explode("/", $route);

        $controllerType = $this->tryGetValueFromRoute($route, 1, 'home');
        $controllerMethod = $this->tryGetValueFromRoute($route, 2, 'index');

        $controllerMethod = strtolower($controllerMethod);
        $controllerType = ucfirst(strtolower($controllerType));

        $class = '\\App\\Controllers\\' . $controllerType . $this->configuration->getDefaultControllerPostfix();

        $reflectionClass = new \ReflectionClass($class);

        $reflectionMethod = $reflectionClass->getMethod($controllerMethod);

        $controllerInstance = Injector::getInstance()->createInstance($reflectionClass);

        $reflectionMethod->invoke($controllerInstance);
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
