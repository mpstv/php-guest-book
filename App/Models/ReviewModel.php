<?php
namespace App\Models;

class ReviewModel
{
    //property $id is auto generated
    public $id;
    public $content;
    public $author;

    public function __construct(string $author = null, string $content = null)
    {
        $this->author = $author;
        $this->content = $content;
    }
}
