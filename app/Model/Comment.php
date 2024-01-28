<?php

namespace App\Model;

class Comment extends Model
{


   protected $table_name = 'comments';
    protected $class_name = 'App\Model\Comment';
    
    public $text;
    public $cover;
    public $deleted_at;
    public $created_at;
    public $updated_at;
}
