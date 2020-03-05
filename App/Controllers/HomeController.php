<?php
namespace App\Controllers;

use App\Models\ReviewModel;
use \Core\Base\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $repository = $this->storage->getRepository(ReviewModel::class);

        $this->view($repository->getAll());
    }
}
