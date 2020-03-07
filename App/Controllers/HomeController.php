<?php
namespace App\Controllers;

use App\Models\ReviewModel;
use \Core\Base\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view($this->storage->getRepository(ReviewModel::class)->getAll());
    }
}
