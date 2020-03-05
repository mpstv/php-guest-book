<?php
namespace Core;

use Core\DAL\DataStorage;

class Application
{
    public function __construct()
    {
        $this->registerAutoload();
    }

    private static function registerAutoload(): void
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }

    public function run(): void
    {
        $router = new Router();

        $router->route($_SERVER['REQUEST_URI']);
    }

    public function registerModel(string $name)
    {
        DataStorage::getInstance()->registerModel($name);
    }
}
