<?php
namespace Core\DAL;

use Core\DAL\Repository;

class DataStorage
{
    private $registeredModels = [];

    public function getRepository(string $className): Repository
    {
        $className = $this->getClassNameWithoutNamespace($className);

        if (!array_key_exists($className, $this->registeredModels)) {
            $this->registerModel($className);
        }

        return $this->registeredModels[$className];
    }

    private function getClassNameWithoutNamespace(string $className): string
    {
        $classNameArray = explode('\\', $className);
        return array_pop($classNameArray);
    }

    private function registerModel(string $className): void
    {
        $this->registeredModels[$className] = new Repository($className);
    }
}
