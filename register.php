<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
	</head>
	<body>
		<form action="register.php" method="POST">
			<input  type="text" name="username" placeholder="username"><br>
			<input type="email" name="email" placeholder="e-mail"><br>
			<input type="password" name="password" placeholder="password"><br>
			<input type="password" name="password2" placeholder="confirm password"><br>
			<input type="submit" name="submit" value="REGISTER">
		</form>

		<?php

		if(isset($_POST['username']) && isset($_POST['password'])) {

			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$usertype = 0;
			$uname_check = "SELECT * FROM users WHERE username='.$username.'";
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

	</body>
</html>
