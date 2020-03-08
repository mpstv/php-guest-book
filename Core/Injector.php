<?php
namespace Core;

class Injector
{
    private $cache = [];

    private static $instance = null;

    public static function getInstance(): Injector
    {
        if (self::$instance === null) {
            self::$instance = new Injector();
        }

        return self::$instance;
    }

    public function createInstance(\ReflectionClass $class): object
    {
        $constructor = $class->getConstructor();

        if ($constructor === null) {
            return $this->createAndAddInstanceToCache($class);
        }

        $parameters = $constructor->getParameters();

        if (count($parameters) === 0) {
            return $this->createAndAddInstanceToCache($class);
        }

        $args = [];
        foreach ($parameters as $parameter) {
            $parameterClass = $parameter->getClass();
            $parameterClassName = $parameterClass->getName();

            if (!array_key_exists($parameterClassName, $this->cache)) {
                $this->cache[] = $this->createInstance($parameterClass);
            }

            $args[] = $this->cache[$parameterClassName];
        }

        return $class->newInstanceArgs($args);
    }

    private function createAndAddInstanceToCache(\ReflectionClass $class): object
    {
        $ins = $class->newInstance();

        $this->cache[$class->getName()] = $ins;

        return $ins;
    }
}
