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
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $user = 'SELECT * FROM users WHERE id='.$id;
  $userquery = mysqli_query($connection, $user);
  $row = mysqli_fetch_array($userquery);
  ?>
  <?php
  if($_SESSION['aaa'] === 'admin') {
    ?>
    <section id="details_header" class="py-4 mb-4 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mr-auto">
            <a href="admin_panel.php" class="btn btn-primary btn-block">
              <i class="fa fa-arrow-left"></i> Back To Dashboard
            </a>
          </div>
          <div class="col-md-3">
            <?php echo '<a href="deleteuser.php?id='.$id.'" class="btn btn-danger btn-block">'; ?>
              <i class="fa fa-remove"></i> Delete
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="posts">
      <div class="container">
        <div class="row">
          <div class="col my-2">
            <div class="card bg-dark">
              <div class="card-header">
                <h4>Edit user: <?php echo $row['username']; ?></h4>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <label class="font-weight-bold" for="username">Username:</label>
                    <input type="text" class="form-control" name="username" <?php echo 'value="'.$row['username'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-bold" for="email">email:</label>
                    <input type="email" class="form-control" name="email" <?php echo 'value="'.$row['email'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-bold" for="password">password:</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <div class="wrapper my-3">
                    <input class="btn btn-success btn-block" type="submit" name="submit" value="Save Changes" required>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
    if(isset($_POST['submit'])) {

      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $encrypted_password = sha1($password);
      if(isset($password) === false) {
      $userupdate = "UPDATE users SET username='$username',email='$email' WHERE id='$id'";
      $result_userupdate = mysqli_query($connection, $userupdate);
      } else {
        $userupdate = "UPDATE users SET username='$username',email='$email',password='$encrypted_password' WHERE id='$id'";
        $result_userupdate = mysqli_query($connection, $userupdate);
      }


      if($result_userupdate) {
        echo "user has been updated.";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'">';

      } else {
        echo "you fucked up.";
      }
    }
  } else {
    header('Location: index.php');
  }
} else {
  echo "you forgo something important cunt";
}
?>
<?php include('includes/footer.php'); ?>
