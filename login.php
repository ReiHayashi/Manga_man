
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
  header('Location: admin_panel.php');
} elseif(isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'user') {
  header('Location: user.php');
} else {?>

  <?php
  if (empty($errors) === true) {
    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
      $query = "SELECT * FROM users WHERE username='".$_POST['username']."'";
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($result);
      $encrypted_password = sha1($_POST['password']);
      if($_POST['username'] === $row['username'] && $encrypted_password === $row['password']) {
        if($_POST['username'] == $row['username'] && $row['usertype']==1) {
          session_start();
          $_SESSION['aaa']='admin';
          $_SESSION['username'] = $row['username'];
          header('Location: admin_panel.php');
          exit();
        }
        elseif($_POST['username'] == $row['username'] && $row['usertype']==0){
          session_start();
          $_SESSION['aaa']='user';
          $_SESSION['username'] = $row['username'];
          header('Location: index.php');
          exit();
        }
      } else {
        $errors[] ='Username or password doesn\'t match';
        echo output_errors($errors);
      }
    }
  } else {
    echo 'Registration failed';
    echo output_errors($errors);
  }
?>
  <!-- LOGIN -->

  <section id="login">
    <div class="vertical-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4 bg-dark rounded">
          <h1 class="display-5 text-center">Sign in</h1>
          <form class="form-group" action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control">
            <label class="mt-3" for="password">Password:</label>
            <input type="password" name="password"  class="form-control">
            <div class="wrapper my-3">
              <input type="submit" name="submit" value="Log in" class="btn btn-primary">
            </div>
          </form>
          <p class="text-center"><a href="register.php">Need an account?</a></p>
        </div>
      </div>
    </div>
    </div>
  </section>

<?php } ?>

<?php include('includes/footer.php'); ?>
