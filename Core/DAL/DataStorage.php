<?php
namespace Core\DAL;

use Core\DAL\Repository;

class DataStorage
{
    private $registeredModels = [];

    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new DataStorage();
        }

        return self::$instance;
    }

    public function registerModel(string $className): void
    {
        $className = $this->getClassNameWithoutNamespace($className);

        $this->registeredModels[$className] = new Repository($className);
    }

    public function getRepository(string $className): Repository
    {
        $className = $this->getClassNameWithoutNamespace($className);

        if (!array_key_exists($className, $this->registeredModels)) {
            throw new \Exception("Model $className is not registred");
        }

        return $this->registeredModels[$className];
    }

    private function getClassNameWithoutNamespace(string $className): string
    {
        $classNameArray = explode('\\', $className);
        return array_pop($classNameArray);
    }
}
