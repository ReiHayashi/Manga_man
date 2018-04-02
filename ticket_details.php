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
<section id="details_header" class="py-4 mb-4 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mr-auto">
        <a href="tickets.php" class="btn btn-primary btn-block">
          <i class="fa fa-arrow-left"></i> Back To Tickets
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
            <h4>View Ticket</h4>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label class="font-weight-bold" for="title">Title:</label>
                <p>Refund lmao</p>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="name">Name:</label>
                <p>Solid Pear</p>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="name">Date:</label>
                <p>April 02, 2018</p>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="message">Message:</label>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio pariatur possimus impedit accusamus debitis temporibus, unde asperiores cumque sint ducimus sequi praesentium error optio id.</p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php'); ?>
