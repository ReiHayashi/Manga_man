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

  <!-- USER -->
<section id="user">
  <div class="container">
    <div class="row rounded">
      <div class="col text-center" style="margin-top: 175;">
        <div class="col-lg-6 offset-lg-3 bg-dark rounded">
          <h3 class="text-center my-2">User page</h3>
        <a class="btn btn-primary btn-lg btn-block d-inline-block mt-3" href="logout.php" role="button">Logout</a> <br>
        <a class="btn btn-primary btn-lg btn-block d-inline-block mt-3" href="passwordchange.php" role="button">Change password</a> <br>
        <a class="btn btn-primary btn-lg btn-block d-inline-block my-3" href="changeemail.php" role="button">Change E-mail</a> <br>
        <a class="btn btn-primary btn-lg btn-block d-inline-block mb-3" href="#" role="button">Purchase history</a>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php
  } else {
    header('Location: index.php');
  }
  ?>
<?php include('includes/footer.php'); ?>
