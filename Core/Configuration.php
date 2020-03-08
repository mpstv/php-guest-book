<?php
namespace Core;

class Configuration
{
    public function getDefaultControllerPostfix(): string
    {
        //TODO: config value from const?
        return 'Controller';
    }
}
