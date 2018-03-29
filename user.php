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
  <h3>User page</h3>
  <a href="logout.php"> logout button incase everything is fucked</a> <br>
  <a href="passwordchange.php"> change password</a> <br>
  <a href="changeemail.php"> change E-mail</a> <br>
  <?php
  } else {
    header('Location: index.php');
  }
  ?>
<?php include('includes/footer.php'); ?>
