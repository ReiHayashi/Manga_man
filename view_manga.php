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
<?php
//id check
if(!empty($_GET['id'])) {
  $id = $_GET['id'];
  $seriesinvolumes = 'SELECT V.*,
  series.primaryname as S, series.author as A, series.start_date as SD, series.end_date as ED, series.synopsis as Synopsis, series.series_id as sid
  FROM volumes AS V
  INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
  INNER JOIN series ON VIS.series_id = series.series_id
  WHERE V.id='.$id;
  $resulttt = mysqli_query($connection, $seriesinvolumes);
  $row = mysqli_fetch_array($resulttt);
  //genre query
  $queryy = 'SELECT series.*,
  group_concat(genres.name) as genres
  FROM series
  INNER JOIN genres_in_series ON genres_in_series.series_id = series.series_id
  INNER JOIN genres ON genres_in_series.genre_id = genres.id
  WHERE series.series_id = '.$row['sid'];
  $resultt = mysqli_query($connection, $queryy);

  //language query
  $query22 = 'SELECT series.*,
  group_concat(languages.language) as languages
  FROM series
  INNER JOIN languages_in_series ON languages_in_series.series_id = series.series_id
  INNER JOIN languages ON languages_in_series.language_id = languages.id
  WHERE series.series_id = '.$row['sid'];
  $result22 = mysqli_query($connection, $query22);
  ?>
  <section id="view_manga">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 bg-dark my-4 rounded-left d-inline-block parent">
          <div class="child">
            <?php echo '<a href=""><img src="uploads/'.$row['image'].'" class="img-fluid py-2" style="height:400px;"></a>'; ?>
          </div>
        </div>
        <div class="col-lg-7 col-md-6   bg-dark my-4">
          <?php echo '<h4>'.$row['S'].' '.$row['title'].'</h4>'; ?>
          <ul class="list-inline">
            <li class="list-inline-item">By:</li>
            <?php  echo '<li class="list-inline-item">'.$row['A'].'</li>'; ?>
          </ul>
          <ul class="list-inline">
            <li class="list-inline-item">Published:</li>
            <?php
            if($row['ED'] == 00-00-0000){
              echo '<li class="list-inline-item">'.$row['SD'].' - ?</li>';
            } else {
              echo '<li class="list-inline-item">'.$row['SD'].' - '.$row['ED'].'</li>';
            }
            ?>
          </ul>
          <ul class="list-inline">
            <li class="list-inline-item">Languages:</li>
            <?php

            while ($row_language = mysqli_fetch_array($result22)) {
              echo '<li class="list-inline-item">'.$row_language['languages'].'</li>';
            }
            ?>
          </ul>
          <ul class="list-inline">
            <li class="list-inline-item">Genres:</li>
            <?php
            while ($row_genre = mysqli_fetch_array($resultt)) {
              echo '<li class="list-inline-item">'.$row_genre['genres'].'</li>';
            }
            ?>
          </ul>
          <h5>Description</h5>
          <?php echo '<p style="font-size:14px;">'.$row['Synopsis'].'</p>'; ?>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 bg-dark my-4 text-center d-inline-block rounded-right justify-content-center parent">
          <div class="child">
            <?php echo '<h2 >$'.$row['price'].'</h2>'; ?>
            <p class="my-2">Free shipping Worldwide</p>
            <?php echo '<a class="btn btn-primary btn-lg d-inline-block mt-3" href="checkout.php?id='.$id.'" role="button">Buy now</a> <br>' ?>
          </div>
        </div>
      </div>
      <?php if(isset($_SESSION['aaa'])) {?>
      <div class="row">
        <div class="col my-2 rounded text-center">
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPostModal">
            <i class="fa fa-pencil"></i> Post review
          </a>
        </div>
      </div>
    <?php }  ?>
      <div class="row">
        <?php
        //genre query
        $reviewsinvolumes = 'SELECT V.*,
        review.username as U, review.content as C, review.datesubmitted as DS
        FROM volumes AS V
        INNER JOIN reviews_in_volumes AS RIS ON RIS.volume_id = V.id
        INNER JOIN review ON RIS.review_id = review.id
        WHERE V.id='.$id;
        $resultt22 = mysqli_query($connection, $reviewsinvolumes);
        while ($roww22 = mysqli_fetch_array($resultt22)) {
          echo '<div class="col-md-10 offset-md-1 card my-4 bg-dark">
          <div class="card-header">Posted By: ';
          echo $roww22['U'];
          echo '</div>';
          echo '<div class="card-body">
          <blockquote class="blockquote mb-0">';
          echo '<p>'.$roww22['C'].'</p>';
          echo '<footer class="blockquote-footer">Posted on '.$roww22['DS'].'</footer>
          </blockquote>
          </div>
          </div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="addPostModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Post Review</h5>
        <button class="close" data-dismiss="modal"> <span>&times;</span> </button>
      </div>
      <div class="modal-body bg-dark">
        <form method="POST" >
          <div class="form-group">
            <label for="body">Review Content</label>
            <textarea name="content" class="form-control" style="min-height: 20%"></textarea>
          </div>
          <div class="modal-footer bg-dark">
            <input class="btn btn-primary" type="submit" name="submit" value="Post review"> <br>
          </form>
          <button class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <?php

  if(isset($_POST['submit'])) {
    $usernamee = $_SESSION['username'];
    $content = $_POST['content'];
    $reviewquery = "INSERT INTO review (username, content) VALUES ('$usernamee', '$content')";
    $review_result = mysqli_query($connection, $reviewquery);
    if($review_result){
      $query11 = "SELECT * FROM review ORDER BY id DESC";
      $rs = mysqli_query($connection, $query11);
      $row11 = mysqli_fetch_array($rs);
      $reviewid = $row11['id'];
      $review_in_volumes = "INSERT INTO reviews_in_volumes (review_id, volume_id) VALUES ('$reviewid', '$id')";
      $review_tie_result = mysqli_query($connection, $review_in_volumes);
      if($review_tie_result) {
        echo 'review posted successfully';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'">';
      } else {
        echo 'Something went horribly wrong';
      }
    } else {
      echo 'something went horribly wrong again and again';
    }
  } else {

  }


  ?>
  <?php } else {
    echo '<h1 class="display-5 text-center">ERROR 404: You shouldn\'t be seeing this, make sure you didn\'t click somewhere you weren\'t supposed to!</h1> <br> <p class="display-5 text-center">if this keeps happening contact us!</p>';
  }  ?>
<?php include('includes/footer.php'); ?>
