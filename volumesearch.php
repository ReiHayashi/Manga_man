
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
if($_SESSION['aaa'] === 'admin') {
  ?>
<section class="bg-dark">
  <div class="container py-2">
    <div class="row">
      <div class="col-mb-6">
        <h1>Volumes</h1>
      </div>
    </div>
  </div>
</section>

<section id="post" class="py-4 mb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mr-auto">
        <a href="admin_panel.php" class="btn btn-primary btn-block">
          <i class="fa fa-arrow-left"></i> Back To Dashboard
        </a>
      </div>
      <div class="col-md6 ml-auto">
        <div class="input-group">
          <form action="" method="POST">
          <input type="text" name="search" class="form-control" palceholder="Search for series name">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" name='volume-search'>Search</button>
          </span>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="posts">
  <div class="container">
    <div class="row">
      <div class="col md-9 mb-4">
        <div class="card bg-dark">
          <div class="card-header">
            <h4>All volumes</h4>
          </div>
          <table class="table table-striped table-dark text-primary">
            <thead class="thead-inverse">
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Series title</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($_POST['volume-search'])) {
                $search = mysqli_real_escape_string($connection, $_POST['search']);
              $volume='SELECT * FROM volumes ORDER BY id DESC';
              $query = mysqli_query($connection,$volume);
              $seriesinvolumes = "SELECT V.*,
              series.primaryname as S
              FROM volumes AS V
              INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
              INNER JOIN series ON VIS.series_id = series.series_id
              WHERE series.primaryname = '$search' OR V.title = '$search'
              ORDER BY V.id DESC";
              $resultt = mysqli_query($connection, $seriesinvolumes);
              $rowrr = mysqli_num_rows($resultt);
              if($rowrr > 0 ) {
                echo "<p>There are ".$rowrr." results matching this search!</p><br>   ";
              while ($row = mysqli_fetch_array($resultt)) {
                echo '<tr>';
                echo '<td scope="row">'.$row['id'].'</td>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['S'].'</td>';
                echo '<td>$'.$row['price'].'</td>';
                echo '<td><a href="volume_details.php?id='.$row['id'].'" class="btn btn-primary">
                <i class="fa fa-angle-double-right"></i>Details</a></td>';
                echo '</tr>';
              }
            } else {
              echo "<p>there are no results matching your search</p>";
            }
          } else {
            echo "search isnt submitted.";
          }
              ?>
            </tbody>
          </table>

      </div>
    </div>
  </div>
</div>
</section>
<?php
} else {
header('Location: index.php');
}
?>

<?php include('includes/footer.php'); ?>
