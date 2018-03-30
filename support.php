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

<!-- SUPPORT -->
<section id="support">
<form action="" method="post">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8" style="margin-top: 100px;">
			<h1 class="display-5 text-center">Support ticket</h1>
			<div class="form-group">
					<label for="username">First Name</label>
					<input type="text" name="firstname" class="form-control">
			</div>
			<div class="form-group">
					<label for="username">Last Name</label>
					<input type="text" name="lastname" class="form-control">
			</div>
			<div class="form-group">
					<label for="username">E-mail</label>
					<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
					<label for="textarea">Problem description</label>
					<textarea name="problem"  class="form-control" style="min-height: 20%"> </textarea>
			</div>
			<div class="wrapper py-2">
				<input href="#" class="btn btn-primary" type="submit" style="color:black">
			</div>
		</div>
	</div>
</div>
</form>
</section>

		<?php

		if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['problem'])) {

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$problem = $_POST['problem'];
				$query="INSERT INTO support (firstname, lastname, email, problem)
				VALUES ('$firstname', '$lastname', '$email', '$problem')";
				$result = mysqli_query($connection, $query);
				if($result) {
					echo "sent a support ticket successfully. Wait for an E-mail from our support team. Process can take up to 24 hours";
				} else {
					echo "something went wrong, try again later.";
				}
}

		?>
<?php include('includes/footer.php'); ?>
