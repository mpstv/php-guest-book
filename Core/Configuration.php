<?php
namespace Core;

class Configuration
{
    private static $instance = null;

    public static function getInstance(): Configuration
    {
        if (self::$instance === null) {
            self::$instance = new Configuration();
        }

        return self::$instance;
    }

    public function getDefaultControllerPostfix(): string
    {
        //TODO: config value from const?
        return 'Controller';
    }
}
