<?php include("config/config.php"); ?>
<?php
session_start();
if (isset($_SESSION['aaa'])&& $_SESSION['aaa']=='admin') {
   include('includes/adminheader.php');
}
elseif (isset($_SESSION['aaa'])&& $_SESSION['aaa']=='user'){
  include('includes/userheader.php');
} else {
  include('includes/header.php');
}

?>
<?php
if (isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'admin') {
  header('Location: admin_panel.php');
} elseif(isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'user') {
  header('Location: index.php');
} else {?>


    <!-- LOGIN -->

    <section id="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4 bg-dark rounded" style="margin-top: 200px;">
          <h1 class="display-5 text-center">Sign in</h1>
          <form class="form-group" action="" method="POST">
              <label for="username">Username:</label>
              <input type="text" name="username" class="form-control">
              <label class="mt-3" for="password">Password:</label>
              <input type="password" name="password"  class="form-control">
            <div class="wrapper my-3">
              <input type="submit" name="submit" class="btn btn-primary">
            </div>
          </form>
          <p class="text-center"><a href="#login">Forgot password?</a></p>
          <p class="text-center"><a href="register.php">Need an account?</a></p>
          </div>
        </div>
      </div>
</section>


    <?php
    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
      $query = "SELECT * FROM users WHERE username='".$_POST['username']."'";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($result);

      if(password_verify($_POST['password']).$row['password']) {
        if($_POST['username'] == $row['username'] && $row['usertype']==1) {
          session_start();
          $_SESSION['aaa']='admin';
          header('Location: admin_panel.php');
          exit();
        }
        elseif($_POST['username'] == $row['username'] && $row['usertype']==0){
          session_start();
          $_SESSION['aaa']='user';
          header('Location: index.php');
          exit();
        }
        else{echo "Incorrect password";}
      }
      else {
        echo "please fill in necessary info";
      }
    }
  }?>
<?php include('includes/footer.php'); ?>
