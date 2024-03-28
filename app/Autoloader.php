<?php

namespace App;

class Autoloader
{

  public static function register()
  {
    spl_autoload_register(array(__CLASS__, 'autoload'));
  }

  public static function autoload($class)
  {
    $nameSpace = explode('\\', $class);
    $i = count($nameSpace) - 1;
    $name = $nameSpace[$i];
    $nameSpace = array_map('strtolower', $nameSpace);
    $nameSpace[$i] = $name;
    $class = implode('/', $nameSpace);
    require $class . '.php';
  }
}
