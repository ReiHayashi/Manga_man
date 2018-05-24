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
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $series='SELECT * FROM series WHERE series_id='.$id;
  $query = mysqli_query($connection,$series);
  $row = mysqli_fetch_array($query);
  ?>
  <?php
  if($_SESSION['aaa'] === 'admin') {
    ?>
    <section id="details_header" class="py-4 mb-4 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mr-auto">
            <a href="series.php" class="btn btn-primary btn-block">
              <i class="fa fa-arrow-left"></i> Back To Series
            </a>
          </div>
          <div class="col-md-3">
            <?php echo '<a href="deleteseries.php?id='.$id.'" class="btn btn-danger btn-block">'; ?>
              <i class="fa fa-remove"></i> Delete
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="posts">
      <div class="container">
        <div class="row">
          <div class="col my-2">
            <div class="card bg-dark">
              <div class="card-header">
                <h4>Edit Serie: <?php echo $row['primaryname']; ?></h4>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <label class="font-weight-bold" for="title">Series Title:</label>
                    <input type="text" class="form-control" name="primaryname" <?php echo 'value="'.$row['primaryname'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-bold" for="authors">Author/s:</label>
                    <input type="text" class="form-control" name="Author" <?php echo 'value="'.$row['author'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-bold" for="date">Start date:</label>
                    <input type="date" name="startdate" max="3000-12-31"
                    min="1000-01-01" class="form-control" <?php echo 'value="'.$row['start_date'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-bold" for="date">End date:</label>
                    <input type="date" name="enddate" max="3000-12-31"
                    min="1000-01-01" class="form-control" <?php echo 'value="'.$row['end_date'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-bold" for="Synopsis">Synopsis:</label>
                    <textarea class="form-control" name="Synopsis" ><?php echo $row['synopsis']; ?></textarea>
                  </div>
                  <div class="wrapper my-3">
                    <input class="btn btn-success btn-block" type="submit" name="submit" value="Save Changes" required>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
if(isset($_POST['submit'])) {
    //muutujad
    $title = mysqli_real_escape_string($connection, $_POST['primaryname']);
    $author = mysqli_real_escape_string($connection, $_POST['Author']);
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $synopsis = $connection, $_POST['Synopsis'];
    //andmebaasi päring
    $seriesupdate = "UPDATE series
                     SET primaryname='$title', author='$author', start_date='$startdate',
                         end_date='$enddate', synopsis='$synopsis'
                     WHERE series_id='$id'";
    $result_seriesupdate = mysqli_query($connection, $seriesupdate);
    //kui andmebaasi päring on läinud edukalt siis
    if($result_seriesupdate) {
      echo "serie has been updated.";
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'">';
    }
    //kui andmebaasi päring ebaõnnestus
    else {
      echo "<h1>Error 500</h1> <br>";
      echo "<p>Internal server error, please try again later.</p>"
    }
  }
} else {
  header('Location: index.php');
}
} else {
  echo "Error 404: <br>";
  echo "Series not found.";
}
?>
<?php include('includes/footer.php'); ?>
