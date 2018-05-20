
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

<!-- SHOP -->

<section id="shop">
  <div class="container">


    <nav class="d-inline-block col-lg-3 bg-dark my-3 rounded d-none collapse">
      <form action='' method='post'>
      <label for="username">Keyword</label>
      <input type="text" name="search-keyword" class="form-control">

      <label class="my-2">Series</label>
      <select class="custom-select my-1 mr-sm-2" name="series">
        <option selected="selected">Default</option>
        <?php
        $series = 'SELECT * FROM series ORDER BY series_id ASC';
        $query4 = mysqli_query($connection, $series);
        while ($row3 = mysqli_fetch_array($query4)) {
          echo '<option value = "'.$row3['series_id'].'">'.$row3['primaryname'].'</option>';
        } ?>
      </select>

      <label class="my-2">Langauge</label>
      <select class="custom-select my-1 mr-sm-2">
        <option selected="selected">Default</option>
        <?php
        $languages = 'SELECT * FROM languages ORDER BY id ASC';
        $query3 = mysqli_query($connection, $languages);
        while ($row2 = mysqli_fetch_array($query3)) {
          echo '<option name = "language" value = "'.$row2['id'].'">'.$row2['language'].'</option>';
        }
        ?>
      </select>

      <label class="my-2">Genre</label>
      <select class="custom-select my-1 mr-sm-2">
        <option selected="selected">Default</option>
        <?php
        $genres = 'SELECT * FROM genres ORDER BY id ASC';
        $query2 = mysqli_query($connection, $genres);
        while ($row1 = mysqli_fetch_array($query2)) {
          echo '<option name = "genre" value = "'.$row1['id'].'">'.$row1['name'].'</option>';
        }
        ?>
      </select>
      <div class="wrapper py-2">
        <input href="#" class="btn btn-primary" id="shop_button" type="submit" name="search-shop" value="Search">
      </div>
    </form>
    </nav>
    <?php
    if(isset($_POST['search-shop'])) {
      if(isset($_POST['search-keyword'])) {
      $search = mysqli_real_escape_string($connection, $_POST['search-keyword']);
      $seriesinvolumes = "SELECT V.*,
      series.primaryname as S, series.author as A
      FROM volumes AS V
      INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      INNER JOIN series ON VIS.series_id = series.series_id
      WHERE series.primaryname = '$search' OR series.author LIKE '%$search%' OR V.title = '$search'
      ORDER BY V.id DESC";
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
        echo '<button class="btn btn-primary"  data-toggle="modal" data-target="#buy">Buy now</button>';
        echo '</div>';
        echo '</div>';
        if($row_count==4) {
          echo "</div>";
          $row_count=0;
        }
      }
    } elseif(isset($_POST['series'])) {
       echo "nigger";
      // $seriesid = $_POST['series'];
      // $seriesinvolumes = "SELECT V.*,
      // series.primaryname as S, series.author as A
      // FROM volumes AS V
      // INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      // INNER JOIN series ON VIS.series_id = '$seriesid'
      //
      // ORDER BY V.id DESC";
      // $resultt = mysqli_query($connection, $seriesinvolumes);
      // $row_count = 0;
      // while ($row = mysqli_fetch_array($resultt)) {
      //   $row_count++;
      //   if($row_count==1) echo '<div class="card-deck">';
      //   echo '<div class="card text-center" style="background-color:black">';
      //   echo '<div class="card-body text-center">';
      //   echo '<a href="view_manga.php?id='.$row['id'].'"><img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
      //   echo '<a href="view_manga.php?id='.$row['id'].'" ><h4>'.$row['S'].' '.$row['title'].'</h4></a>';
      //   echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info"><p>'.$row['A'].'</p></a>';
      //   echo '<p>'.$row['price'].'$</p>';
      //   echo '</div>';
      //   echo '<div class="card-footer">';
      //   echo '<button class="btn btn-primary"  data-toggle="modal" data-target="#buy">Buy now</button>';
      //   echo '</div>';
      //   echo '</div>';
      //   if($row_count==4) {
      //     echo "</div>";
      //     $row_count=0;
      //   }
      // }
    }
    } else {
     ?>
    <div class="col-lg-9 my-3 float-right">
      <?php
      $no_of_records_per_page = 16;
      $offset = ($page-1) * $no_of_records_per_page;
      //manga query
      $seriesinvolumes = "SELECT V.*,
      series.primaryname as S, series.author as A
      FROM volumes AS V
      INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      INNER JOIN series ON VIS.series_id = series.series_id
      ORDER BY V.id DESC
      LIMIT $offset, $no_of_records_per_page";
      //pagination
      $yesyesyes = "SELECT COUNT('id') FROM volumes";
      $yesyesyes_result = mysqli_query($connection, $yesyesyes);
      $total_rows = mysqli_fetch_array($yesyesyes_result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);
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
        echo '<button class="btn btn-primary"  data-toggle="modal" data-target="#buy">Buy now</button>';
        echo '</div>';
        echo '</div>';
        if($row_count==4) {
          echo "</div>";
          $row_count=0;
        }
      }
      ?>

    </div>
    <!-- PAGINATION SHIT THAT WORKS AAAAAAAAAAAAAAA -->
    <div class="col d-inline-block">
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
      <?php }
       ?>
    </ul>
  </div>
<?php } ?>
</div>
</section>
<div class="modal fade" id="buy">
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
