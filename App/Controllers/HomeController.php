<?php
namespace App\Controllers;

use \Core\Base\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view();
    }
}
