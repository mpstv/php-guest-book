<?php
namespace App\Controllers;

use \App\Models\ReviewModel;
use \Core\Base\BaseController;

class ReviewController extends BaseController
{
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
