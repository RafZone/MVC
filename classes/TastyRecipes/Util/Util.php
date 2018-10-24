<?php

namespace TastyRecipes\Util;

class Util
{
  public static function init()
  {
    spl_autoload_register(function($class){
      include 'C:/xampp/htdocs/MVC/classes/'.str_replace('\\', '/', $class).'.php';
    });
  }
}
