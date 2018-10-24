<?php

session_start();
//ob_start();

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once '../../classes/TastyRecipes/Util/Util.php';
Util::init();

$controller = SessionManager::getController();


if(isset($_POST['submit']))
{

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  if(!empty($uid) && !empty($pwd) && ctype_print($uid) && ctype_print($pwd))
  {
    $controller->logIn($uid, $pwd);
    SessionManager::setController($controller);
    header("Location: ../views/index.php?login=success");
  }

  else
  {
    header("Location: ../views/index.php?login=error");
  }
}
