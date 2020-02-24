<?php
namespace Core;

class Application
{
    public function run()
    {
        $this->registerAutoload();

        $router = new Router();

        $router->route($_SERVER['REQUEST_URI']);
    }

    public static function registerAutoload()
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
}
