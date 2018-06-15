
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
        <div class="col-sm-12 col-md-10 col-lg-8 bg-dark rounded mt-4">
          <h1 class="display-5 text-center">Support ticket</h1>
          <div class="form-group">
            <label for="username">Problem Title</label>
            <input type="text" name="problemtitle" class="form-control">
          </div>
          <div class="form-group">
            <label for="username">First Name:</label>
            <input type="text" name="firstname" class="form-control">
          </div>
          <div class="form-group">
            <label for="username">Last Name:</label>
            <input type="text" name="lastname" class="form-control">
          </div>
          <div class="form-group">
            <label for="username">E-mail:</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="textarea">Problem description:</label>
            <textarea name="problem"  class="form-control" style="min-height: 20%"> </textarea>
          </div>
          <div class="wrapper my-3">
            <input href="#" class="btn btn-primary" type="submit">
          </div>
        </div>
      </div>
    </div>
  </form>
</section>

<?php
// kui kõik andmed on sisestatud siis jookse läbi järgmist koodi
if(isset($_POST['firstname']) && isset($_POST['lastname']) &&
  isset($_POST['email']) && isset($_POST['problem']) &&
  isset($_POST['problemtitle'])) {
  //muutujad
  $problemtitle = mysqli_real_escape_string($connection, $_POST['problemtitle']);
  $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $problem = mysqli_real_escape_string($connection, $_POST['problem']);
  $username = mysqli_real_escape_string($connection, $_SESSION['username']);
  //päring
  $query="INSERT INTO support (firstname, lastname, email, problem_title, problem, username)
  VALUES ('$firstname', '$lastname', '$email', '$problemtitle', '$problem', '$username')";
  $result = mysqli_query($connection, $query);
  //kui päring õnnestus siis näita järgmist
  if($result) {
    echo "sent a support ticket successfully.
          Wait for an E-mail from our support team.
          Process can take up to 24 hours";
  }
  //kui päring ebaõnnestus
  else {
    echo "something went wrong, try again later.";
  }
}

?>
<?php include('includes/footer.php'); ?>
