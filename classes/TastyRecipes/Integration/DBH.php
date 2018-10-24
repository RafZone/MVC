<?php

namespace TastyRecipes\Integration;

use TastyRecipes\Model\Comment;
use TastyRecipes\Model\User;
use TastyRecipes\Model\UserLogIn;

class DBH
{
  public static function connect()
  {
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "loginsystem";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    return $conn;
  }

  public static function logIn(UserLogIn $user)
  {
    $conn = self::connect();
    $uid = mysqli_real_escape_string($conn, $user->getUserName());
    $pwd = mysqli_real_escape_string($conn, $user->getPassword());

    if(empty($uid) || empty($pwd))
    {
      /*header("Location: ../../index.php?login=empty");
      exit();*/
      throw new \Exception("Empty");
    }

    else
    {
      $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1)
      {
        /*header("Location: ../../index.php?login=error");
        exit();*/
        throw new \Exception("Error");
      }

      else
      {
        if($row = mysqli_fetch_assoc($result))
        {
          $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
          if($hashedPwdCheck == false)
          {
            /*header("Location: ../../index.php?login=error");
            exit();*/
            throw new \Exception("Error");
          }

          elseif($hashedPwdCheck == true)
          {
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['u_first'] = $row['user_first'];
            $_SESSION['u_last'] = $row['user_last'];
            $_SESSION['u_email'] = $row['user_email'];
            $_SESSION['u_uid'] = $row['user_uid'];
            /*header("Location: ../../index.php?login=success");
            exit();*/
          }
        }
        else
        {
          /*header("Location: ../../index.php?login=errorrrrr");
          exit();*/
          throw new \Exception("Errorrrr last");
        }
      }
    }
  }

  public static function setComment(Comment $comment, $page)
  {
    $conn = self::connect();
    $UserComment = mysqli_real_escape_string($conn, $comment->getMsg());
    $date = mysqli_real_escape_string($conn, $comment->getDate());
    $userId = mysqli_real_escape_string($conn, $comment->getUserName());
    $sql = "";
    if(!empty($UserComment) && $page == 1)
    {
      $sql = "INSERT INTO meatballscomments (user_uid, date, message) VALUES ('$userId', '$date', '$UserComment')";
    }
    elseif (!empty($UserComment) && $page == 2)
    {
      $sql = "INSERT INTO pancakescomments (user_uid, date, message) VALUES ('$userId', '$date', '$UserComment')";
    }
    mysqli_query($conn, $sql);
    //echo "$sql";


  }

  public static function getComments($pageId)
  {
    $conn = self::connect();
    echo "<br>";
    $sql = "";
    if($pageId == 1)
    {
      $sql = "SELECT * FROM meatballscomments";
    }
    elseif($pageId == 2)
    {
      $sql = "SELECT * FROM pancakescomments";
    }
    else{echo "errroorrr"; exit();}
    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc())
    {
      echo "<div class = 'comment-box'>";
      echo '<span class = "user">'.$row['user_uid'].'</span><br><br>';
      echo "<p>".htmlspecialchars($row['message'])."</p>";
      echo '<span class = "datef">'.$row['date'].'</span>';

      if(isset($_SESSION['u_id']) && $_SESSION['u_uid'] == $row['user_uid'])
      {
        echo "<br>";
        echo "<form method = 'POST' action = '../../resources/extras/deleteComment.php'>";
        echo "<input type = 'hidden' name = 'cid' value = '".$row['cid']."'>";
        if($pageId == 1)
          echo "<button class = 'btn' type = 'submit' name = 'meatballsDelete'>Delete</button>";
        elseif ($pageId == 2)
          echo "<button class = 'btn' type = 'submit' name = 'pancakesDelete'>Delete</button>";
        else
          echo "errrrooooooorrrrrrrrrr";

        echo "</form>";
      }

      echo "</div><hr>";
    }
  }

  public static function deleteComment($pageId, $cid)
  {
    $conn = self::connect();
    $sql = "DELETE FROM $pageId WHERE cid = '$cid'";
    $result = mysqli_query($conn, $sql);
    /*if ($pageId == "meatballscomments")
    {
      echo "meatsss";
    }
    elseif ($pageId == "pancakescomments")
    {
      echo "pannnss";
    }*/
  }

  public static function signUp(User $user)
  {
    $conn = self::connect();
    $first = mysqli_real_escape_string($conn, $user->getFirstName());
    $last = mysqli_real_escape_string($conn, $user->getLastName());
    $email = mysqli_real_escape_string($conn, $user->getEmail());
    $uid = mysqli_real_escape_string($conn, $user->getUserName());
    $pwd = mysqli_real_escape_string($conn, $user->getPassword()); //this could be the mistake ----> change to 'password'

    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd))
    {
      /*header("Location: ../signup.php?signup=empty");
      exit();*/
      throw new \Exception("Empty");
    }

    else
    {
      if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
      {
        /*header("Location: ../signup.php?signup=invalid");
        exit();*/
        throw new \Exception("Invalid");
      }

      else
      {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
          /*header("Location: ../signup.php?signup=email");
          exit();*/
          throw new \Exception("Email");
        }

        else
        {
          $sql = "SELECT * FROM users WHERE user_uid='$uid'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0)
          {
            /*header("Location: ../signup.php?signup=usertaken");
            exit();*/
            throw new \Exception("usertaken");
          }

          else
          {
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
            mysqli_query($conn, $sql);
            /*header("Location: ../signup.php?signup=success");
            exit();*/
          }
        }
      }
    }
  }

  /**this is the end of the static methods
  **/

}
