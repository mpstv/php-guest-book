<?php
namespace Core\Base;

use Core\Configuration;
use Core\Injector;
use Core\Router;

class BaseController
{
    private $configuration;

    protected function view($viewData = null, string $viewName = null, string $folderName = null): void
    {
        $classNameArray = explode('\\', get_called_class());

        $calledClass = array_pop($classNameArray);
        $calledClassWithoutPostfix = str_replace($this->getConfiguration()->getDefaultControllerPostfix(), '', $calledClass);

        if ($folderName === null) {
            $folderName = $calledClassWithoutPostfix;
        }

        if ($viewName === null) {
            $viewName = debug_backtrace()[1]["function"];
        }

        include $_SERVER['DOCUMENT_ROOT'] . "/App/Views/$folderName/$viewName.php";
    }

    protected function redirect(string $path)
    {
        header('Location:' . $path);

        $router = new Router();
        $router->route($path);
    }

    private function getConfiguration()
    {
        if ($this->configuration === null) {
            $this->configuration = $this->configuration = Injector::getInstance()->createInstance(new \ReflectionClass(Configuration::class));
        }

        return $this->configuration;
    }
}
