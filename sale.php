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
    <?php
    //manga query
    $seriesinvolumes = 'SELECT V.*,
    series.primaryname as S, series.author as A
    FROM volumes AS V
    INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
    INNER JOIN series ON VIS.series_id = series.series_id
    WHERE V.price<10
    ORDER BY V.id ASC';
    $resultt = mysqli_query($connection, $seriesinvolumes);
    $row_count = 0;
    while ($row = mysqli_fetch_array($resultt)) {
      $row_count++;
      if($row_count==1) echo '<div class="card-deck">';
      echo '<div class="card text-center" style="background-color:black">';
      echo '<div class="card-body text-center">';
      echo '<a href="view_manga.php?id='.$row['id'].'"><img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
      echo '<a href="view_manga.php?id='.$row['id'].'" ><h4>'.$row['S'].' '.$row['title'].'</h4></a>';
      echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info"><p>'.$row['A'].'</p></a>';
      echo '<p>'.$row['price'].'$</p>';
      echo '</div>';
      echo '<div class="card-footer">';
      echo '<button class="btn btn-info">ADD TO CART</button>';
      echo '</div>';
      echo '</div>';
      if($row_count==6) {
        echo "</div>";
        $row_count=0;
      }
    }
    ?>

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
