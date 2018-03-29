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
  if($_SESSION['aaa'] === 'user') {
  ?>
  <div class="container">
    <div class="row rounded">
      <div class="col text-center mt-5">
        <h3 class="text-center">User page</h3>
        <div class="col-lg-6 offset-lg-3 bg-dark my-5 rounded">
        <a class="btn btn-primary btn-lg btn-block" href="logout.php" role="button">Logout</a> <br>
        <a class="btn btn-primary btn-lg btn-block" href="#" role="button">Change username</a> <br>
        <a class="btn btn-primary btn-lg btn-block" href="passwordchange.php" role="button">Change password</a> <br>
        <a class="btn btn-primary btn-lg btn-block" href="changeemail.php" role="button">Change E-mail</a> <br>
        <a class="btn btn-primary btn-lg btn-block" href="#" role="button">Purchase history</a>
        </div>
      </div>
    </div>
  </div>
  <?php
  } else {
    header('Location: index.php');
  }
  ?>
<?php include('includes/footer.php'); ?>
