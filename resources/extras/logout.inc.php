<?php

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once '../../classes/TastyRecipes/Util/Util.php';
Util::init();

$controller = SessionManager::getController();

if (isset($_POST['submit']))
{
  $controller->logout();
  SessionManager::setController($controller);
  header("Location: ../../home.php");
  //exit();
}
