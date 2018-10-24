<?php

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';
Util::init();

$controller = SessionManager::getController();

if (isset($_POST['submit']))
{
  //include_once 'dbh.inc.php';
  $first = mysqli_real_escape_string($conn, $_POST['first']);
  $last = mysqli_real_escape_string($conn, $_POST['last']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']); //this could be the mistake ----> change to 'password'

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
