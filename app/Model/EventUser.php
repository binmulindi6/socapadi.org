<?php

namespace App\Model;

class EventUser extends Model
{


    protected $table_name = 'event_users';
    protected $class_name = 'App\Model\EventUser';

    public $event_id;
    public $user_id;
    public $role;
    public $is_active;
    public $deleted_at;
    public $created_at;
    public $updated_at;


    public function user()
    {
        $instance = new User();
        return $instance->find($this->user_id);
    }
    public function event()
    {
        $instance = new Event();
        return $instance->find($this->event_id);
    }
}
