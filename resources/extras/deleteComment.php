<?php

  use TastyRecipes\Controller\SessionManager;
  use TastyRecipes\Util\Util;

  require_once '../../classes/TastyRecipes/Util/Util.php';
  Util::init();

  if(isset($_POST['meatballsDelete']))
  {
    $controller = SessionManager::getController();
    $cid = $_POST['cid'];
    $controller->deleteComment("meatballscomments" , $cid);
    SessionManager::setController($controller);
    header("Location: ../views/meatballs.php");
  }

  if(isset($_POST['pancakesDelete']))
  {
    $controller = SessionManager::getController();
    $cid = $_POST['cid'];
    $controller->deleteComment("pancakescomments" , $cid);
    SessionManager::setController($controller);
    header("Location: ../views/pancakes.php");
  }
