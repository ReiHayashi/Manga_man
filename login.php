<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <form class="login" action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username"> <br>
      <input type="password" name="password" placeholder="Password"><br>
      <input type="submit" name="submit" value="Login">
    </form>
    <?php
    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
      $query = "SELECT * FROM users WHERE username='".$_POST['username']."'";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($result);

      if(password_verify($_POST['password']).$row['password']) {
        if($_POST['username'] == $row['username'] && $row['usertype']==1) {
          $_SESSION['aaa']='admin';
          $_SESSION['name']=$row['username'];
          header('Location: admin.php');
          exit();
        }
        elseif($_POST['username'] == $row['username'] && $row['usertype']==0){
          $_SESSION['aaa']='user';
          $_SESSION['name']=$row['username'];
          header('Location: index.php');
          exit();
        }
        else{echo "Incorrect password";}
      }
      else {
        echo "please fill in necessary info";
      }
    }
    ?>
  </body>
</html>
