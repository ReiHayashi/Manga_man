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


    <!-- LOGIN -->
    <section id="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4  style="margin-top: 170px;"">
          <form class="form-group" action="" method="POST">
              <label for="username">your username</label>
              <input type="text" name="username" class="form-control">
              <label for="password">Current password</label>
              <input type="password" name="password" class="form-control">
              <label for="password">New password</label>
              <input type="password" name="newpassword"  class="form-control">
            <div class="wrapper py-2">
              <input type="submit" name="submit" class="btn btn-primary">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
</section>


    <?php
    if(isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['newpassword']) && !empty($_POST['username'])) {
      $password = $_POST['password'];
      $newpassword = $_POST['newpassword'];
      $username = $_POST['username'];
      $query = "SELECT * FROM users WHERE username='".$_POST['username']."'";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($result);

      if($_POST['password'] === $row['password']) {
        $updatequery = "UPDATE users SET password='$newpassword' WHERE username='$username'";
        $resultt = mysqli_query($connection, $updatequery);
        if($resultt) {
          echo "password has been changed";
        } else {
          echo "something went wrong try again later, or i have fucked up again";
        }
      }
      else {
        echo "incorrect password";
      }
    }
  ?>
<?php include('includes/footer.php'); ?>
