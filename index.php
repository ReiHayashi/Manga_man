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
        <img src="img/manga.png" alt="" class="img-fluid d-none d-lg-block">
      </div>
    </div>
  </div>
</div>
</section>

<!-- SHOP -->

<section id="shop_index">
  <div class="container">

    <div class="row text-center my-4">
      <div class="col">
        <h1 class="pb-3">NEW RELEASES</h1>
      </div>
    </div>

    <div class="row">
      <div class="card-deck">
        <?php
        //manga query
        $seriesinvolumes = 'SELECT V.*,
        series.primaryname as S, series.author as A
        FROM volumes AS V
        INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
        INNER JOIN series ON VIS.series_id = series.series_id
        ORDER BY V.id DESC LIMIT 6';
        $resultt = mysqli_query($connection, $seriesinvolumes);
        while ($row = mysqli_fetch_array($resultt)) {

          echo '<div class="card text-center" style="background-color:black">';
          echo '<div class="card-body text-center">';
          echo '<a href="view_manga.php?id='.$row['id'].'"><img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
          echo '<a href="view_manga.php?id='.$row['id'].'" ><h4>'.$row['S'].' '.$row['title'].'</h4></a>';
          echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info"><p>'.$row['A'].'</p></a>';
          echo '<p>'.$row['price'].'$</p>';
          echo '</div>';
          echo '<div class="card-footer">';
          echo '<a class="btn btn-primary" href="checkout.php">Buy now</a>';
          echo '</div>';
          echo '</div>';
        }
        ?>


        <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

      </div>
    </div>
  </div>
</div>
</section>
<?php include('includes/footer.php'); ?>
