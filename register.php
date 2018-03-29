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
if (isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'admin') {
  header('Location: admin.php');
} elseif(isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'user') {
  header('Location: index.php');
} else {?>
<!-- LOGIN -->
<section id="login">
<form action="" method="post">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-4" style="margin-top: 100px;">
			<h1 class="display-5">Register</h1>
			<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
					<label for="username">E-mail</label>
					<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password"  class="form-control">
			</div>
			<div class="form-group">
					<label for="password">Confrim password</label>
					<input type="password" name="password"class="form-control">
			</div>
			<div class="wrapper py-2">
				<input href="#" class="btn btn-primary" type="submit">

			</div>
		</div>
	</div>
</div>
</form>
</section>

		<?php

		if(isset($_POST['username']) && isset($_POST['password'])) {

			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
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
				} else {
					echo "user registration failed";
				}
			}
		}

  }?>
<?php include('includes/footer.php'); ?>
