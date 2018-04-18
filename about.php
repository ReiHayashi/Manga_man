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

<!-- ABOUT -->

<section id="about" class="py-4 text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="mb-2">
          <h1 class=" display-5 pb-3">
            Why this store?
          </h1>
          <div class="plead pb-3">
            Our store is known to be the be-all and end-all store for buying manga in the manga community.
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="card-deck">
        <div class="card bg-dark">
          <div class="card-body">
            <h3>24/7 CUSTOMER SUPPORT</h3>
            <p>Our developers will help you with any problem you are having at any time.</p>
          </div>
        </div>


        <div class="card text-center bg-dark">
          <div class="card-body">
            <h3>DIGITAL AND PHYSICAL</h3>
            <p>Buying manga here will get you a physical copy and a digital copy.</p>
          </div>
        </div>

        <div class="w-100 d-none d-md-block d-lg-none my-3"><!-- wrap every 2 on md--></div>

        <div class="card text-center bg-dark">
          <div class="card-body">
            <h3>WORLDWIDE SHIPPING</h3>
            <p>We ship to anywhere in the world, be it New Zeland, Australia or Philippines.</p>
          </div>
        </div>

        <div class="card text-center bg-dark">
          <div class="card-body">
            <h3>MULTIPLE LANGUAGES</h3>
            <p>Our manga is can be bought in russian, english, japanse, french and more.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DEVELOPERS -->

<section id="developers" class="my-2 text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="info-header mb-4">
          <h1 class=" display-5 pb-3">
            Meet the developers.
          </h1>
          <div class="plead pb-1">
            The people that made this store.
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mb-5">
      <div class="card-deck" style="height:300; width:600;">
        <div class="card bg-dark">
          <div class="card-body">
            <img src="img/timoke.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
            <h3>Timoke</h3>
            <h5>Front-end developer</h5>
            <p>The person who did most of the design and styling.</p>
          </div>
        </div>

        <div class="card bg-dark">
          <div class="card-body">
            <img src="img/sun.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
            <h3>Misha</h3>
            <h5>Back-end developer</h5>
            <p>The person who did most of the database and PHP.</p>
          </div>
        </div>
    </div>
  </div>

</section>

<?php include('includes/footer.php'); ?>
