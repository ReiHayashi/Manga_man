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
<!-- INDEX -->

<section id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4 class="my-5">• LARGE SELECTION OF MANGA TO CHOOSE FROM</h4>
        <h4 class="my-5">• DIGITAL AND PHYSICAL COPIES AVAILABLE</h4>
        <h4 class="my-5">• 24/7 HELPFUL CUSTOMER SUPPORT</h4>
        <h4 class="my-5">• WORLDWIDE SHIPPING</h4>
        <h4 class="my-5">• MULTIPLE LANGAUGES</h4>
      </div>
      <div class="col-lg-6">
        <img src="img/manga1.png" alt="" class="img-fluid d-none d-lg-block">
      </div>
    </div>
  </div>
</div>
</section>

<!-- SHOP -->

<section id="shop_index">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h1 class="pb-3">BEST SELLERS</h1>
      </div>
    </div>
    <div class="row">
      <div class="card-deck">
        <div class="card mb-4" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" ><h4>Berserak</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card mb-4" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card mb-4" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

        <div class="card mb-4" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card mb-4" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card mb-4" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

      </div>
    </div>

    <div class="row text-center my-4">
      <div class="col">
        <h1 class="pb-3">NEW RELEASES</h1>
      </div>
    </div>

    <div class="row">
      <div class="card-deck">
        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

                <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>


      </div>
    </div>
    <div class="row text-center my-4">
      <div class="col">
        <h1 class="pb-3">STAFF PICKS</h1>
      </div>
    </div>
    <div class="row">
      <div class="card-deck">
        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

                <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

        <div class="card" style="background-color:black">
          <div class="card-body text-center">
            <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
            <a href="" class="text-info"><h4>Berserk</h4></a>
            <a href="" class="text-info"><p>Kentaro Miura</p></a>
            <p>9.99$</p>
            <button class="btn btn-info">ADD TO CART</button>
          </div>
        </div>

                <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
                
      </div>
    </div>
  </div>
</div>
</section>

<?php include('includes/footer.php'); ?>
