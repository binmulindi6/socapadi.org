<?php

namespace App\Model;

class Project extends Model
{
    protected $table_name = 'projects';
    protected $class_name = 'App\Model\Project';


    public $name;
    public $cover;
    public $body;
    public $debut;
    public $fin;
    public $partenaire;
    public $state;
}
