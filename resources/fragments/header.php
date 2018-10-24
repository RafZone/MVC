<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body>
    <header>
      <div class="midd"><a href = "../../home.php"> <img src = "../images/trans.png" alt = "Centeral Image" align="middle" height = "100" width = "500"> </a></div>
      <nav>
        <div class="main-wrapper">
          <ul>
            <li><a href="../views/index.php" class = "btn">Home</a></li>
            <li><a href="../views/calendar2017.php" class = "btn">Calendar</a></li>
          </ul>
          <div class="nav-login">
            <?php
              if(isset($_SESSION['u_id']))
              {
                echo '<form action="../extras/logout.inc.php" method="POST">
                        <button type="submit" name="submit" class = "btn">Logout</button>
                      </form>';
              }
              else
              {
                echo '<form action="../extras/login.inc.php" method="POST">
                        <input type="text" name="uid" placeholder="Username/e-email">
                        <input type="password" name="pwd" placeholder="password">
                        <button type="submit" name="submit" class = "btn">Login</button>
                        <a href="../views/signup.php" class ="btn">Sign up</a>
                      </form>';
              }
            ?>
          </div>
        </div>
      </nav>
    </header>
