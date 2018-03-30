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

    <!-- CHANGE EMAIL -->

    <section id="login">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4  style="margin-top: 170px;"">
          <form class="form-group" action="" method="POST">
              <label for="username">your username</label>
              <input type="text" name="username" class="form-control">
              <label for="email">Current E-mail</label>
              <input type="email" name="email" class="form-control">
              <label for="email">New E-mail</label>
              <input type="email" name="newemail"  class="form-control">
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
    if(isset($_POST['submit']) && !empty($_POST['newemail']) && !empty($_POST['email']) && !empty($_POST['username'])) {
      $email = $_POST['email'];
      $newemail = $_POST['newemail'];
      $username = $_POST['username'];
      $query = "SELECT * FROM users WHERE username='".$_POST['username']."'";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($result);

      if($_POST['email'] === $row['email']) {
        $updatequery = "UPDATE users SET email='$newemail' WHERE username='$username'";
        $resultt = mysqli_query($connection, $updatequery);
        if($resultt) {
          echo "email has been changed";
        } else {
          echo "something went wrong try again later, or i have fucked up again";
        }
      } else {
        echo "suck a benis";
      }
    }
  ?>
<?php include('includes/footer.php'); ?>
