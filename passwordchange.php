
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
  header('Location: admin.php');
} elseif(isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'user') {?>

  <?php
  if(isset($_POST['submit']) && !empty($_POST['password']) && !empty($_POST['newpassword']) && isset($_SESSION['username'])) {
    $password = $_POST['password'];
    $encrypted_password = sha1($password);
    $newpassword = $_POST['newpassword'];
    $new_encrypted_password = sha1($newpassword);
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if($encrypted_password === $row['password']) {
      $updatequery = "UPDATE users SET password='$new_encrypted_password' WHERE username='$username'";
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
<!-- PASSWORD CHANGE -->

<section id="passwordchange">
  <div class="vertical-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-4 bg-dark rounded">
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


<?php }else {
  header('Location: index.php');
} ?>
<?php include('includes/footer.php'); ?>
