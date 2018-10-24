<?php

namespace TastyRecipes\Model;

class Comment
{
  private $username;
  private $date;
  private $msg;

  public function __construct($uid,$date,$msg)
  {
    $this->username = $uid;
    $this->date = $date;
    $this->msg = $msg;
  }

  public function getUserName()
  {
    return $this->username;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getMsg()
  {
    return $this->msg;
  }

}
