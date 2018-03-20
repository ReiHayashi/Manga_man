<?php include("config/config.php"); ?>
<?php include("includes/header.php");?>
<?php
if ($_SESSION['aaa'] === 'admin') {
  header('Location: admin.php');
} elseif($_SESSION['aaa'] === 'user') {
  header('Location: index.php');
} else {?>


    <!-- LOGIN -->

    <section id="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4  style="margin-top: 170px;"">
          <h1 class="display-5">Sign in</h1>
          <form class="form-group" action="" method="POST">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control">
              <label for="password">Password</label>
              <input type="password" name="password"  class="form-control">
            <div class="wrapper py-2">
              <input type="submit" name="submit" class="btn btn-primary">
            </div>
          </form>
          </div>
        </div>
      </div>
      <p class="text-center"><a href="#login">Forgot password?</a></p>
      <p class="text-center"><a href="register.php">Need an account?</a></p>
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
          header('Location: admin.php');
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
