<?php
namespace Core\Base;

class BaseController
{
    protected function view($viewName = null, $folderName = null)
    {
        $calledClass = array_pop(explode('\\', get_called_class()));
        $calledClassWithoutPostfix = str_replace('Controller', '', $calledClass);

        if (is_null($folderName)) {
            $folderName = $calledClassWithoutPostfix;
        }

        if (is_null($viewName)) {
            $viewName = debug_backtrace()[1]["function"];
        }

        include $_SERVER['DOCUMENT_ROOT'] . "/App/Views/$folderName/$viewName.php";
    }
}
