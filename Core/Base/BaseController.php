<?php
namespace Core\Base;

use Core\Configuration;

class BaseController
{
    protected $configuration;

    public function __construct()
    {
        $this->$configuration = Configuration::getInstance();
    }

    protected function view($viewName = null, $folderName = null)
    {
        $calledClass = array_pop(explode('\\', get_called_class()));
        $calledClassWithoutPostfix = str_replace($this->$configuration->getDefaultControllerPostfix(), '', $calledClass);

        if ($folderName === null) {
            $folderName = $calledClassWithoutPostfix;
        }

        if ($viewName === null) {
            $viewName = debug_backtrace()[1]["function"];
        }

        include $_SERVER['DOCUMENT_ROOT'] . "/App/Views/$folderName/$viewName.php";
    }
}
