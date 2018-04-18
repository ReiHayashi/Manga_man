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

    <section id="changeemail">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-4 bg-dark rounded" style="margin-top: 200px;">
            <h3 class="display-5 text-center my-3">Change E-mail</h1>
            <form class="form-group" action="" method="POST">
              <label class="mt-3" for="password">Current E-mail:</label>
              <input type="email" name="email" class="form-control">
              <label class="mt-3" for="password">New E-mail:</label>
              <input type="email" name="newemail"  class="form-control">
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
    if(isset($_POST['submit']) && !empty($_POST['newemail']) && !empty($_POST['email']) && isset($_SESSION['username'])) {
      $email = $_POST['email'];
      $newemail = $_POST['newemail'];
      $username = $_SESSION['username'];
      $query = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
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
