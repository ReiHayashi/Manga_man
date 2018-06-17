
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
    <div class="vertical-center">
    <div class="container">
      <div class="row rounded justify-content-center">
        <div class="col text-center">
          <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-8 offset-2 bg-dark rounded">
            <h3 class="text-center my-2">User page</h3>
            <a class="btn btn-primary btn-lg btn-block d-inline-block" href="logout.php" role="button">Logout</a> <br>
            <a class="btn btn-primary btn-lg btn-block d-inline-block my-3" href="passwordchange.php" role="button">Change password</a> <br>
            <a class="btn btn-primary btn-lg btn-block d-inline-block" href="changeemail.php" role="button">Change E-mail</a> <br>
            <a class="btn btn-primary btn-lg btn-block d-inline-block my-3" href="reviews.php" role="button">Reviews</a> <br>
            <a class="btn btn-primary btn-lg btn-block d-inline-block my-3" href="purchases.php" role="button">Purchases</a> <br>
            <?php
            $username = $_SESSION['username'];
            $selectuserid = "SELECT * FROM users WHERE username='$username'";
            $result3 = mysqli_query($connection, $selectuserid);
            $row2 = mysqli_fetch_array($result3);
            $userid = $row2['id'];
            $queryyy = 'SELECT * FROM address_in_users WHERE user_id = '.$userid;
            $resulttt = mysqli_query($connection, $queryyy);
            if(mysqli_num_rows($resulttt) == 1) {
              echo '<a class="btn btn-primary btn-lg btn-block d-inline-block mb-3" href="changeaddress.php" role="button">Change Address</a><br>';
            }?>
          </div>
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
