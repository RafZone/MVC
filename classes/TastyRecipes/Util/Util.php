<?php

namespace TastyRecipes\Util;

class Util
{
  public static function init()
  {
    spl_autoload_register(function($class){
      include 'classes/'.str_replace('\\', '/', $class).'.php';
    });
  }
}
