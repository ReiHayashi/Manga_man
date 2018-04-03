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
$id = $_GET['id']; ?>
<section id="details_header" class="py-4 mb-4 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mr-auto">
        <a href="tickets.php" class="btn btn-primary btn-block">
          <i class="fa fa-arrow-left"></i> Back To Tickets
        </a>
      </div>
      <div class="col-md-3">
        <?php echo '<a href="deleteticket.php?id='.$id.'" class="btn btn-success btn-block">' ?>
          <i class="fa fa-check"></i> Mark as Resolved
        </a>
      </div>
    </div>
  </div>
</section>
<?php
$support ='SELECT * FROM support WHERE support_id='.$id.'';
$query = mysqli_query($connection,$support);
$row = mysqli_fetch_array($query)
 ?>
<section id="posts">
  <div class="container">
    <div class="row">
      <div class="col my-2">
        <div class="card bg-dark">
          <div class="card-header">
            <h4>View Ticket</h4>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label class="font-weight-bold" for="title">Title:</label>
                <p><?php echo $row['problem_title']; ?></p>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="E-mail">E-mail:</label>
                <p><?php echo $row['email']; ?></p>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="name">Name:</label>
                <p><?php echo $row['firstname']."  ".$row['lastname']; ?>r</p>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="name">Date:</label>
                <p><?php echo "placeholder";  ?></p>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="message">Message:</label>
                <p><?php echo $row['problem']; ?></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php'); ?>
