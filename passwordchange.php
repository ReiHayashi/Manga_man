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

    <!-- PASSWORD CHANGE -->

    <section id="passwordchange">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-4 bg-dark rounded" style="margin-top: 200px;">
            <h3 class="display-5 text-center my-3">Change password</h1>
            <form class="form-group" action="" method="POST">
              <label class="mt-3" for="password">Current password:</label>
              <input type="password" name="password" class="form-control">
              <label class="mt-3" for="password">New password:</label>
              <input type="password" name="newpassword"  class="form-control">
              <div class="wrapper my-3">
                <input type="submit" name="submit" class="btn btn-primary">
              </div>
            </form>
            </div>
          </div>
        </div>
    </div>
</section>


    <?php
    if(isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['newpassword']) && isset($_SESSION['username'])) {
      $password = $_POST['password'];
      $newpassword = $_POST['newpassword'];
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
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
