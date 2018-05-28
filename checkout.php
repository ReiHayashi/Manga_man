
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
} elseif(isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'user') {
  header('Location: user.php');
} else {?>

  <!-- CHECKOUT -->

  <section id="checkout">
    <form action="" method="post">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-4 bg-dark rounded" style="margin-top: 100px;">
            <h1 class="display-5 text-center">Checkout</h1>
            <div class="form-group">
              <label>Full name*</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Address line 1*</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Address line 2</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Town/City*</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Country*</label>
              <select class="form-control" name="">
              <option value="">lol</option>
              </select>
            </div>
            <div class="form-group">
              <label>Postcode/Zip*</label>
              <input type="number" class="form-control">
            </div>
            <div class="wrapper py-2">
              <input href="#" class="btn btn-primary" type="submit" value="Buy">
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

  <?php

  if(empty($_POST) === false){
  if (empty($errors) === true) {

    }
  if (strlen($_POST['password']) < 8) {
        $errors[] ='Password has to be at least 8 characters long!';
    }
      if (preg_match("/^[0-9A-Za-z_]+$/", $_POST['username']) == 0) {
        $errors[] ='Username contains non-allowed characters.';
  }
}
  if (empty($errors) === true) {
  if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $usertype = 0;
    $uname_check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $rs = mysqli_query($connection,$uname_check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if($data[0] > 1){
      echo "User or email already registered";
    } else {
      $query="INSERT INTO users (username, email, password, usertype)
      VALUES ('$username', '$email', '$password', '$usertype')";
      $result = mysqli_query($connection, $query);
      if($result) {
        echo "user created successfully.";
        header('Location: login.php');
      } else {
        echo "user registration failed";
      }
    }
  }
} else {
  echo 'Registration failed';
  echo output_errors($errors);
}

}?>
<?php include('includes/footer.php'); ?>
