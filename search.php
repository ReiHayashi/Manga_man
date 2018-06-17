
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

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
?>

<!-- SEARCH -->

<section id="search">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h1 class="my-3">Search results</h1>
      </div>
    </div>
    <div class="row">
      <?php
      if(isset($_POST['submit-search'])) {
      $search = mysqli_real_escape_string($connection, $_POST['search']);

      $no_of_records_per_page = 12;
      $offset = ($page-1) * $no_of_records_per_page;
      //manga query
      $seriesinvolumes = "SELECT V.*,
      series.primaryname as S, series.author as A
      FROM volumes AS V
      INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      INNER JOIN series ON VIS.series_id = series.series_id
      WHERE series.primaryname = '$search' OR series.author LIKE '%$search%' OR series.synopsis LIKE '%$search%' OR V.title = '$search'
      ORDER BY V.id ASC";
      $resultt = mysqli_query($connection, $seriesinvolumes);
      $rowrr = mysqli_num_rows($resultt);
      if($rowrr > 0 ) {
        echo "<p>There are ".$rowrr." results!</p><br>   ";
      //while loop for content
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
        echo '<a class="btn btn-primary" href="checkout.php?id='.$row['id'].'">Buy now</a>';
        echo '</div>';
        echo '</div>';
        if($row_count==4) {
          echo "</div>";
          $row_count=0;
        }
      }
    } else {
      echo "<p>there are no results matching your search</p>";
    }
  } else {
    echo "search isnt submitted.";
  }
      ?>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

    </div>
  </div>

</section>

<?php include('includes/footer.php'); ?>
