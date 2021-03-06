
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
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email'])) {
      $username = htmlspecialchars(trim($_POST['username']));
      $email = htmlspecialchars(trim($_POST['email']));
      $password = htmlspecialchars(trim($_POST['password']));
      $password_confirmation = htmlspecialchars(trim($_POST['password2']));
      $encrypted_password = sha1($password);
      $usertype = 0;
      $uname_check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
      $rs = mysqli_query($connection,$uname_check);
      $data = mysqli_fetch_array($rs, MYSQLI_NUM);
      if($data[0] > 1){
        echo "User or email already registered";
      } else {
        if($password === $password_confirmation) {
          $query="INSERT INTO users (username, email, password, usertype)
          VALUES ('$username', '$email', '$encrypted_password', '$usertype')";
          $result = mysqli_query($connection, $query);
          if($result) {
            echo "user created successfully.";
            header('Location: login.php');
          } else {
            echo '<p class="display-5 text-center">user registration failed</p>';
          }
        } else {
          echo '<p class="display-5 text-center">Registration failed</p>';
          $errors[] ='Password do not match!';
          echo output_errors($errors);
        }
      }
    } else {

    }
  } else {
    echo '<p class="display-5 text-center">Registration failed</p>';
    echo output_errors($errors);
  }
?>

  <!-- REGISTER -->

  <section id="login">
    <form action="" method="post">
      <div class="vertical-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-8 col-8 bg-dark rounded">
            <h1 class="display-5 text-center">Register</h1>
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="username">E-mail:</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" name="password"  class="form-control" required>
            </div>
            <div class="form-group">
              <label for="password">Confrim password:</label>
              <input type="password" name="password2"class="form-control" required>
            </div>
            <div class="wrapper py-2">
              <input href="#" class="btn btn-primary" type="submit" value="Register">

            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
<?php } ?>
<?php include('includes/footer.php'); ?>
