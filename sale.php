
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

<!-- SALE -->

<section id="sale">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h1 class="my-3">Manga under 10$</h1>
      </div>
    </div>
    <div class="row">
      <?php
      $no_of_records_per_page = 18;
      $offset = ($page-1) * $no_of_records_per_page;
      //manga query
      $seriesinvolumes = "SELECT V.*,
      series.primaryname as S, series.author as A
      FROM volumes AS V
      INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      INNER JOIN series ON VIS.series_id = series.series_id
      WHERE V.price<9.98
      ORDER BY V.id ASC
      LIMIT $offset, $no_of_records_per_page";
      $resultt = mysqli_query($connection, $seriesinvolumes);
      //pagination
      $yesyesyes = "SELECT COUNT('id') FROM volumes WHERE price<9.98";
      $yesyesyes_result = mysqli_query($connection, $yesyesyes);
      $total_rows = mysqli_fetch_array($yesyesyes_result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);
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
        if($row_count==6) {
          echo "</div>";
          $row_count=0;
        }
      }
      ?>

      <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>

    </div>
  </div>


  <!-- PAGINATION SHIT THAT WORKS AAAAAAAAAAAAAAA -->
  <nav>
    <ul class="pagination justify-content-center">
      <?php if($page == 1) {} else {?>
        <li class="page-item "><a class="page-link" href="?page=1">First</a></li>
      <?php } ?>
      <li class="<?php if($page == 1){ echo 'disabled'; } ?> page-item">
        <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?> " tabindex="-1">Previous</a>
      </li>
    </li>

    <?php
    if ($total_pages >= 1) {
      for ($i=1; $i<=$total_pages ; $i++) {
        if ($i==$page) {
          echo "<li class=\"page-item\"><b><a class=\"page-link\" href=\"?page=$i\">$i</a></b></li> ";
        } else {
          echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$i\">$i</a></li> ";
        }

      }
    }?>
    <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?> page-item">
      <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
    </li>
    <?php if($page == $total_pages || $total_pages == 0) { } else {?>
      <li class="page-item"><a class="page-link"  href="?page=<?php echo $total_pages; ?>">Last</a></li>
    <?php } ?>
  </ul>
</nav>
</section>
<?php include('includes/footer.php'); ?>
