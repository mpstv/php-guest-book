<?php
namespace Core\Base;

class BaseController
{
    protected function view($folderName, $viewName)
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/App/Views/$folderName/$viewName.php";
    }
}
