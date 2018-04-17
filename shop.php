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

<!-- SHOP -->

<section id="shop">
    <div class="container">
      <div class="row">
        <button class="d-none d-md-block d-lg-none btn btn-primary" data-toggle="collapse" data-target="#Search" type="button" aria-expanded="false" aria-controls="Search">SEARCH</button>

        <div class="form-inline col-3 bg-dark my-3 rounded d-none d-lg-block collapse" id="Search">

          <label for="username">Keyword</label>
          <input type="text" name="text" class="form-control">

          <label class="my-2">Price range</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>All</option>
            <option value="1">Under €15</option>
            <option value="2">€15 to 30€</option>
            <option value="3">€30 +</option>
          </select>

          <label class="my-2">Availability</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>All</option>
            <option value="1">In stockr</option>
            <option value="1">Pre-order</option>
          </select>

          <label class="my-2">Langauge</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>English</option>
            <option value="1">Japanese</option>
            <option value="2">French</option>
            <option value="3">Italian</option>
            <option value="3">German</option>
            <option value="3">Spanish</option>
          </select>

          <label class="my-2">Genre</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>Choose</option>
            <option value="1">Action</option>
            <option value="2">Adventure</option>
            <option value="3">Comdey</option>
            <option value="3">Drama</option>
            <option value="3">Slice of Life</option>
            <option value="3">Fantasy</option>
            <option value="3">Magic</option>
            <option value="3">Supernatural</option>
            <option value="3">Horror</option>
            <option value="3">Mystery</option>
            <option value="3">Psychological</option>
            <option value="3">Romance</option>
            <option value="3">Sci-Fi</option>
          </select>
          <div class="wrapper py-2">
            <input href="#" class="btn btn-primary" id="shop_button" type="submit" value="Search">
          </div>
        </div>

        <div class="col-lg-9 my-3">
        <div class="row">
            <?php
            //manga query
            $seriesinvolumes = 'SELECT V.*,
            series.primaryname as S, series.author as A
            FROM volumes AS V
            INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
            INNER JOIN series ON VIS.series_id = series.series_id
            ORDER BY rand()';
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
              if($row_count==4) {
                echo "</div>";
                $row_count=0;
              }
            }
            ?>
          </div>
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
    </div>
  </div>
</section>
<?php include('includes/footer.php'); ?>
