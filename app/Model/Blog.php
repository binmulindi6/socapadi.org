<?php

namespace App\Model;

class Blog extends Model
{
    protected $table_name = 'blogs';
    protected $class_name = 'App\Model\Blog';


    public $title;
    public $descrition;
    public $body;
    public $author;
    public $cover;
}
