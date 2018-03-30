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

<!-- SALE -->

<section id="sale">
<div class="container">
  <div class="row text-center">
    <div class="col">
      <h1 class="my-3">THINGS ON SALE</h1>
    </div>
  </div>
  <div class="row">
    <div class="card-deck">
      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafaasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

    </div>
    <div class="card-deck">
      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafaasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

    </div>
    <div class="card-deck">
      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafaasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

    </div>
    <div class="card-deck">
      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafaasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

    </div>
    <div class="card-deck">
      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafaasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="card text-center" style="background-color:black">
        <div class="card-body text-center">
          <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
          <a href="" ><h4>Berserak</h4></a>
          <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
          <p>9.99$</p>
        </div>
        <div class="card-footer">
          <button class="btn btn-info">ADD TO CART</button>
        </div>
      </div>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

    </div>
  </div>

  <nav>
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
  </section>

<?php include('includes/footer.php'); ?>
