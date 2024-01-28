<?php

namespace App\Model;

class Venue extends Model
{


   protected $table_name = 'venues';
    protected $class_name = 'App\Model\Venue';

    
    public $name;
    public $location;
    public $ln;
    public $lat;
    public $capacity;
    public $contacts;
    public $cover;
    public $deleted_at;
    public $created_at;
    public $updated_at;
}
