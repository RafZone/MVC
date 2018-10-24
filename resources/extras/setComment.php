<?php

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';
Util::init();

$controller = SessionManager::getController();

if(isset($_SESSION['u_id']) && isset($_POST['meatballsSubmit']))
{
  $user_uid = $_SESSION['u_uid'];
  $date = $_POST['date'];
  $message = $_POST['message'];
  $page = 1;
  if(!empty($message))
  {
    $controller->setComment($user_uid, $date, $message, $page);
  }
  header('Location: ../views/meatballs.php');
  /*echo "{$_SESSION['u_uid']}<br>";
  echo "$user_uid<br>";
  echo "$date<br>";
  echo "$message<br>";*/
}

if(isset($_SESSION['u_id']) && isset($_POST['pancakesSubmit']))
{
  $user_uid = $_SESSION['u_uid'];
  $date = $_POST['date'];
  $message = $_POST['message'];
  $page = 2;
  if(!empty($message))
  {
    $controller->setComment($user_uid, $date, $message, $page);
  }
  header('Location: ../views/pancakes.php');
  /*echo "{$_SESSION['u_uid']}<br>";
  echo "$user_uid<br>";
  echo "$date<br>";
  echo "$message<br>";*/
}
