<?php

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once '../../classes/TastyRecipes/Util/Util.php';
Util::init();

function getComments($page)
{
    echo "<br><br>";
    $controller = SessionManager::getController();
    $controller->getComments($page);
    SessionManager::setController($controller);

}
