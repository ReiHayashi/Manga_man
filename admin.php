<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>admin page</title>
  </head>
  <body>
    <?php
    session_start();
    if($_SESSION['aaa'] === 'admin') {
    ?>
    <a href="addmanga.php"> add manga </a> <br>
    <a href="managamanga.php"> managa mangas</a> <br>
    <a href="users.php"> manage users </a> <br>
    <a href="admin.php"> admin page</a> <br>
    <a href="logout.php"> emergency logout</a> <br>
    <?php
    } else {
      header('Location: index.php');
    }
    ?>
  </body>
</html>
