<?php

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once '../../classes/TastyRecipes/Util/Util.php';
Util::init();

$controller = SessionManager::getController();

if (isset($_POST['submit']))
{
  //include_once 'dbh.inc.php';
  $first = htmlentities ($_POST['first'], ENT_QUOTES, 'UTF-8');
  $last = htmlentities($_POST['last'], ENT_QUOTES, 'UTF-8');
  $email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
  $uid = htmlentities($_POST['uid'], ENT_QUOTES, 'UTF-8');
  $pwd = htmlentities($_POST['pwd'], ENT_QUOTES, 'UTF-8'); //this could be the mistake ----> change to 'password'

  if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd))
  {
    header("Location: ../views/signup.php?signup=empty");
    exit();
  }

  else
  {
    $controller->signUp($first, $last, $uid, $email, $pwd);
    SessionManager::setController($controller);
    header("Location: ../views/signup.php?signup=success");
  }
}

else
{
  header("Location: ../views/signup.php");
  exit();
}
