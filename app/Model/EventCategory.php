<?php

namespace App\Model;

class EventCategory extends Model
{
   protected $table_name = 'event_categories';
    protected $class_name = 'App\Model\EventCategory';
    
    public $id;
    public $name;
    public $cover;
    public $deleted_at;
    public $created_at;
    public $updated_at;


    public function events(){
        $eventInstance = new Event();
        return $eventInstance->getByOptions(['event_category_id', $this->id]);
    }
}
