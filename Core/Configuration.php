<?php
namespace Core;

class Configuration
{
    private static $instance = null;

    public static function getInstance()
    {
        if ($self->$instance === null) {
            $self->$instance = new Configuration();
        }

        return $self->$instance;
    }

    public function getDefaultControllerPostfix()
    {
        //TODO: config value from const?
        return 'Controller';
    }
}
