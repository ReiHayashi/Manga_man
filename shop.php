
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
    <nav class="d-inline-block navbar-expand-lg col-sm-12 col-md-12 col-lg-3 bg-dark my-3 rounded d-none navbar-toggleable-md navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsecontroller" aria-controls="collapsecontroller" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-align-justify"></span>
    </button>
      <h2 class="text-center d-inline" >Search form</h2>
    <div class="collapse navbar-collapse" id="collapsecontroller">
      <form action='' method='post'>
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
      <select class="custom-select my-1 mr-sm-2" name="language">
        <option selected="selected">Default</option>
        <?php
        $languages = 'SELECT * FROM languages ORDER BY id ASC';
        $query3 = mysqli_query($connection, $languages);
        while ($row2 = mysqli_fetch_array($query3)) {
          echo '<option value = "'.$row2['id'].'">'.$row2['language'].'</option>';
        }
        ?>
      </select>

      <label class="my-2">Genre</label>
      <select class="custom-select my-1 mr-sm-2" name="genre">
        <option selected="selected">Default</option>
        <?php
        $genres = 'SELECT * FROM genres ORDER BY id ASC';
        $query2 = mysqli_query($connection, $genres);
        while ($row1 = mysqli_fetch_array($query2)) {
          echo '<option value = "'.$row1['id'].'">'.$row1['name'].'</option>';
        }
        ?>
      </select>
      <label class="my-2">Price</label>
      <select class="custom-select my-1 mr-sm-2" name="price">
        <option selected="selected">Default</option>
        <option value="19.99">lower than $20</option>
        <option value="14.99">lower than $15</option>
        <option value="9.99">lower than $10</option>
        <option value="7.99">lower than $8</option>
      </select>
      <div class="wrapper py-2">
        <input class="btn btn-primary" id="shop_button" type="submit" name="search-shop" value="Search">
      </div>
      </div>
    </form>
    </nav>
    <div class="col-lg-9 my-3 float-right">
    <?php
    if(isset($_POST['search-shop'])){
    if(is_numeric($_POST['series'])) {
      $seriesid = $_POST['series'];
      $seriesinvolumes = "SELECT V.*,
      series.primaryname as S, series.author as A
      FROM volumes AS V
      INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      INNER JOIN series ON VIS.series_id = series.series_id
      WHERE VIS.series_id = '$seriesid'
      ORDER BY V.id ASC";
      $resultt = mysqli_query($connection, $seriesinvolumes);
      $row_count = 0;
      while ($row = mysqli_fetch_array($resultt)) {
        $row_count++;
        if($row_count==1) echo '<div class="card-deck">';
        echo '<div class="card text-center" style="background-color:black">';
        echo '<div class="card-body text-center">';
        echo '<a href="view_manga.php?id='.$row['id'].'">
              <img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" >
              <h4>'.$row['S'].' '.$row['title'].'</h4></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info">
              <p>'.$row['A'].'</p></a>';
        echo '<p>'.$row['price'].'$</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<a class="btn btn-primary" href="checkout.php">Buy now</a>';
        echo '</div>';
        echo '</div>';
        if($row_count==4) {
          echo "</div>";
          $row_count=0;
        }
      }
    }
    if(is_numeric($_POST['language'])) {
     $languageid = $_POST['language'];
     $seriesinvolumes = "SELECT V.*,
     series.primaryname as S, series.author as A
     FROM volumes AS V
     INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
     INNER JOIN series ON VIS.series_id = series.series_id
     INNER JOIN languages_in_series ON languages_in_series.series_id = series.series_id
     INNER JOIN languages ON languages_in_series.language_id = languages.id
     WHERE languages_in_series.language_id = '$languageid'
     ORDER BY V.id ASC";
     $resultt = mysqli_query($connection, $seriesinvolumes);
     $row_count = 0;
     while ($row = mysqli_fetch_array($resultt)) {
       $row_count++;
       if($row_count==1) echo '<div class="card-deck">';
       echo '<div class="card text-center" style="background-color:black">';
       echo '<div class="card-body text-center">';
       echo '<a href="view_manga.php?id='.$row['id'].'">
            <img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
       echo '<a href="view_manga.php?id='.$row['id'].'" >
            <h4>'.$row['S'].' '.$row['title'].'</h4></a>';
       echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info">
            <p>'.$row['A'].'</p></a>';
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
    }
    if(is_numeric($_POST['genre'])) {
      $genreid = $_POST['genre'];
      $seriesinvolumes = "SELECT V.*,
      series.primaryname as S, series.author as A
      FROM volumes AS V
      INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      INNER JOIN series ON VIS.series_id = series.series_id
      INNER JOIN genres_in_series ON genres_in_series.series_id = series.series_id
      INNER JOIN genres ON genres_in_series.genre_id = genres.id
      WHERE genres_in_series.genre_id = '$genreid'
      ORDER BY V.id ASC";
      $resultt = mysqli_query($connection, $seriesinvolumes);
      $row_count = 0;
      while ($row = mysqli_fetch_array($resultt)) {
        $row_count++;
        if($row_count==1) echo '<div class="card-deck">';
        echo '<div class="card text-center" style="background-color:black">';
        echo '<div class="card-body text-center">';
        echo '<a href="view_manga.php?id='.$row['id'].'">
              <img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" >
              <h4>'.$row['S'].' '.$row['title'].'</h4></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info">
              <p>'.$row['A'].'</p></a>';
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

    }
    if(is_numeric($_POST['price'])) {
      $pricevalue = $_POST['price'];
      $seriesinvolumes = "SELECT V.*,
      series.primaryname as S, series.author as A
      FROM volumes AS V
      INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
      INNER JOIN series ON VIS.series_id = series.series_id
      WHERE V.price < '$pricevalue'
      ORDER BY V.id ASC";
      $resultt = mysqli_query($connection, $seriesinvolumes);
      $row_count = 0;
      while ($row = mysqli_fetch_array($resultt)) {
        $row_count++;
        if($row_count==1) echo '<div class="card-deck">';
        echo '<div class="card text-center" style="background-color:black">';
        echo '<div class="card-body text-center">';
        echo '<a href="view_manga.php?id='.$row['id'].'">
              <img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" >
              <h4>'.$row['S'].' '.$row['title'].'</h4></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info">
              <p>'.$row['A'].'</p></a>';
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
    }
    } else {
     ?>
      <?php
      //lehek
      $no_of_records_per_page = 16;
      $offset = ($page-1) * $no_of_records_per_page;
      //manga päring
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
      //muutuja
      $row_count = 0;
      //tsükkel mis sülitab välja päringust andmed
      while ($row = mysqli_fetch_array($resultt)) {
        $row_count++;
        if($row_count==1) echo '<div class="card-deck">';
        echo '<div class="card text-center" style="background-color:black">';
        echo '<div class="card-body text-center">';
        echo '<a href="view_manga.php?id='.$row['id'].'">
              <img src="uploads/'.$row['image'].'" alt="" class="img-fluid mb-3"></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" >
              <h4>'.$row['S'].' '.$row['title'].'</h4></a>';
        echo '<a href="view_manga.php?id='.$row['id'].'" class="text-info">
              <p>'.$row['A'].'</p></a>';
        echo '<p>'.$row['price'].'$</p>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<button class="btn btn-primary"  data-toggle="modal" data-target="#buy">Buy now</button>';
        echo '</div>';
        echo '</div>';
        //iga nelja tulemuse järel lõppetab card-deck'i
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
<?php include('includes/footer.php'); ?>
