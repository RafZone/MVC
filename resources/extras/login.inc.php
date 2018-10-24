<?php

session_start();
ob_start();

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once '../../classes/TastyRecipes/Util/Util.php';
Util::init();

$controller = SessionManager::getController();


if(isset($_POST['submit']))
{

  $uid = htmlentities($_POST['uid'], ENT_QUOTES, 'UTF-8');
  $pwd = htmlentities($_POST['pwd'], ENT_QUOTES, 'UTF-8');

  if(!empty($uid) && !empty($pwd) && ctype_print($uid) && ctype_print($pwd))
  {
    $controller->logIn($uid, $pwd);
    SessionManager::setController($controller);
    header("Location: ../views/index.php?login=success");
  }

  else
  {
    header("Location: ../views/index.php?login=erroooooor");
  }
}
