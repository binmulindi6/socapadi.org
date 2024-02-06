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

    public static function notify($user, $title, $text, $icon = 'notifications')
    {
        $instance = new Notification();
        $item =  $instance->create(
            [
                'title' => $title,
                'icon' => $icon,
                'text' => $text,
                'user_id' => $user,
                'created_at' => date('Y-m-d h:i'),
            ]
        );
    }
}
