
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
<!-- CART -->
<section id="cart">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 cold-sm-2 my-5 bg-dark rounded text-center">
        <h3>Your cart</h3>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-lg-2 col-md-2 col-sm-2 bg-dark rounded-left">
        <a href=""><img src="img/berserk.jpg" class="img-fluid my-2"></a>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 bg-dark">
        <div class="col-lg-6 col-md-6 col-sm-6 my-2">
          <h3>Berserk</h3>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col- my-3">
          <span>Language: English</span> <br>
          <span>Author: Miura Kentarou</span>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 my-4">
          <span>Price: 4.99€</span> <br>
          <span>50% off</span>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
          <p>Available - dispatched in 4 business days</p>
        </div>
      </div>

      <div class="col-lg-2 col-md-2 col-sm-2 bg-dark rounded-right text-center">
        <h3 class="my-2">Quantity</h3>
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
        <h3 class="my-2">4.99€</h3>
        <button class="btn btn-primary btn-lg  d-inline-block my-2">Delete</button>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-lg-2 col-md-2 col-sm-2 bg-dark rounded-left">
        <a href=""><img src="img/berserk.jpg" class="img-fluid my-2"></a>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 bg-dark">
        <div class="col-lg-6 col-md-6 col-sm-6 my-2">
          <h3>Berserk</h3>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col- my-3">
          <span>Language: English</span> <br>
          <span>Author: Miura Kentarou</span>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 my-4">
          <span>Price: 4.99€</span> <br>
          <span>50% off</span>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
          <p>Available - dispatched in 4 business days</p>
        </div>
      </div>

      <div class="col-lg-2 col-md-2 col-sm-2 bg-dark rounded-right text-center">
        <h3 class="my-2">Quantity</h3>
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
        <h3 class="my-2">4.99€</h3>
        <button class="btn btn-primary btn-lg  d-inline-block my-2">Delete</button>
      </div>
    </div>
    <div class="row">
      <div class="col bg-dark text-center rounded my-3">
        <h3>Total Cost 9.98€</h3>
        <div class="my-2">
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addvolume">
            <i class=""></i> Checkout
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="addvolume">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Checkout</h5>
        <button class="close" data-dismiss="modal"> <span>&times;</span> </button>
      </div>
      <div class="modal-body bg-dark">
        <form action="#" method="POST">
          <div class="form-group">
            <label>Full name*</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Address line 1*</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Address line 2</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Town/City*</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Country*</label>
            <select class="form-control" name="">
            <option value="">lol</option>
            </select>
          </div>
          <div class="form-group">
            <label>Postcode/Zip*</label>
            <input type="number" class="form-control">
          </div>

          <div class="modal-footer bg-dark">
            <button class="btn btn-primary" data-dismiss="modal">Close</button>
            <input class="btn btn-primary" type="submit" name="submit2">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
