<?php

namespace App\Model;

class Like extends Model
{


   protected $table_name = 'likes';
    protected $class_name = 'App\Model\Like';
    
    public $event_id;
    public $user_id;
    public $deleted_at;
    public $created_at;
    public $updated_at;
}
