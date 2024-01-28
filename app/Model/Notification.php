<?php

namespace App\Model;

class Notification extends Model
{


    protected $table_name = 'notifications';
    protected $class_name = 'App\Model\Notification';
    
    public $title;
    public $icon;
    public $text;
    public $user_id;
    public $deleted_at;
    public $created_at;
    public $updated_at;
}
