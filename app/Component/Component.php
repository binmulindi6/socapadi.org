<?php

namespace App\Component;


class Component{

    public static function get($view) {
        return require('components/'.$view.'.php');
    }
}