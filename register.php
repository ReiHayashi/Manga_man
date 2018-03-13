<?php include("config/config.php"); ?>
<?php include("includes/header.php");?>

<!-- LOGIN -->
<section id="login">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-4" style="margin-top: 100px;">
			<h1 class="display-5 text-center">Register</h1>
			<div class="form-group">
					<input type="text" id="username" placeholder="Enter username:" class="form-control">
			</div>
			<div class="form-group">
					<input type="text" id="username" placeholder="Enter email:" class="form-control">
			</div>
			<div class="form-group">
					<input type="text" id="password" placeholder="Enter password:" class="form-control">
			</div>
			<div class="form-group">
					<input type="text" id="password" placeholder="Enter password:" class="form-control">
			</div>
			<div class="wrapper py-2">
				<a href="#" class="btn btn-primary">Register</a>
			</div>
		</div>
	</div>
</div>
</section>

		<?php

		if(isset($_POST['username']) && isset($_POST['parool'])) {

			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$usertype = 0;
			$uname_check = "SELECT * FROM users WHERE username=$username";
			$result1 = mysqli_query($connection, $uname_check);
			if(!$result1 and mysqli_num_rows($result1)>0){
				echo "User already exists";
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

		?>
<?php include('includes/footer.php'); ?>
