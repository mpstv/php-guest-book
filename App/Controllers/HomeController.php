<?php
namespace App\Controllers;

use \App\Models\ReviewModel;
use \Core\Base\BaseController;
use \Core\DAL\DataStorage;

class HomeController extends BaseController
{
    private $storage;

    public function __construct(DataStorage $storage)
    {
        $this->storage = $storage;
    }

    public function index()
    {
        $this->view($this->storage->getRepository(ReviewModel::class)->getAll());
    }
}
