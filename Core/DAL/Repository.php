<?php
namespace Core\DAL;

class Repository
{
    private $fileName;
    private $data = null;

    public function __construct($modelName)
    {
        $documentRoot = $_SERVER['DOCUMENT_ROOT'];

        if (!file_exists("$documentRoot\\storage")) {
            mkdir("$documentRoot\\storage");
        }

        $this->fileName = "$documentRoot\\storage\\$modelName.dat";
    }

    public function getAll(): array
    {
        return $this->getData();
    }

    public function add($element): void
    {
        $data = $this->getData();

        $data[] = $element;

        $result = file_put_contents($this->fileName, \serialize($data));
    }

    private function getData(): array
    {
        if ($this->data === null) {
            $fileContent = file_get_contents($this->fileName);

            if ($fileContent) {
                $this->data = \unserialize($fileContent);
            } else {
                $this->data = [];
            }
        }

        return $this->data;
    }
}
