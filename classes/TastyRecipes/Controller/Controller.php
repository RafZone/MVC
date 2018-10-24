<?php

namespace TastyRecipes\Controller;

use TastyRecipe\Integration\DBH;
use TastyRecipe\Model\Comment;
use TastyRecipe\Model\User;
use TastyRecipe\Model\UserLogIn;

class Controller
{

  public function logOut()
  {
    session_start();
    session_unset();
    session_destroy();
  }

  public function logIn($userName, $password)
  {
    $user = new UserLogIn($userName, $password);
    DBH::logIn($user);
  }

  public function getComments($pageId)
  {
    return DBH::getComments($pageId);
  }

  public function setComment($uid, $date, $message, $page)
  {
    $comment = new Comment($uid, $date, $message);
    return DBH::setComment($comment, $page);
  }

  public function deleteComment($pageId, $usercid)
  {
    DBH::deleteComment($pageId, $usercid);
  }

  public function signUp($firstName, $lastName, $userName, $email, $password)
  {
    $newUser = new User($firstName, $lastName, $userName, $email, $password);
    DBH::signUp($newUser);
  }



}
