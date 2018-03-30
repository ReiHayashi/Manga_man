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
<div class="container">
  <div class="row">
    <div class="col my-5 bg-dark rounded">
      <h3>Your cart</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2 bg-dark rounded-left">
      <a href=""><img src="img/berserk.jpg" class="img-fluid my-2"></a>
    </div>
    <div class="col-lg-8 bg-dark">
      <div class="col-lg-6">
        <h3>Berserk</h3>
      </div>
      <div class="col-lg-8 my-3">
        <span>Language: English</span> <br>
        <span>Author: Miura Kentarou</span>
      </div>
      <div class="col-lg-8 my-4">
        <span>Price: 4.99€</span> <br>
        <span>50% off</span>
      </div>
      <div class="col-lg-8">
        <p>Available - dispatched in 4 business days</p>
      </div>
    </div>
    <div class="col-lg-2 bg-dark rounded-right">
      <label class="my-2">Quantity</label>
      <select class="custom-select my-1 mr-sm-2">
        <option selected>1</option>
        <option value="1">2</option>
        <option value="2">3</option>
        <option value="3">4</option>
        <option value="4">5</option>
        <option value="5">6</option>
        <option value="6">7</option>
        <option value="7">8</option>
        <option value="8">9</option>
        <option value="9">10+</option>
      </select>
      <div class="col-lg-2 my-3">
        <h3>4.99€</h3>
      </div>
      <div class="col-lg-2 my-3">
        <button class="btn btn-primary btn-lg  d-inline-block">delete</button>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
