<?php
namespace Core\Base;

use Core\Configuration;
use Core\DAL\DataStorage;

class BaseController
{
    protected $configuration;
    protected $storage;

    public function __construct()
    {
        $this->configuration = Configuration::getInstance();
        $this->storage = DataStorage::getInstance();
    }

    protected function view($viewData = null, string $viewName = null, string $folderName = null): void
    {
        $classNameArray = explode('\\', get_called_class());

        $calledClass = array_pop($classNameArray);
        $calledClassWithoutPostfix = str_replace($this->configuration->getDefaultControllerPostfix(), '', $calledClass);

        if ($folderName === null) {
            $folderName = $calledClassWithoutPostfix;
        }

        if ($viewName === null) {
            $viewName = debug_backtrace()[1]["function"];
        }

        include $_SERVER['DOCUMENT_ROOT'] . "/App/Views/$folderName/$viewName.php";
    }
}
