<?php
namespace App\Controllers;

use App\Models\ReviewModel;
use Core\Base\BaseController;
use Core\DAL\DataStorage;

class ReviewController extends BaseController
{
    private $storage;

    public function __construct(DataStorage $storage)
    {
        $this->storage = $storage;
    }

    public function index()
    {
        $this->view();
    }

    public function create()
    {
        $review = new ReviewModel(
            htmlspecialchars($_POST['author']),
            htmlspecialchars($_POST['content'])
        );

        $this->storage->getRepository(ReviewModel::class)->add($review);

        $this->redirect('/');
    }
}
