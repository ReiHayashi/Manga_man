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
  $volume='SELECT * FROM volumes WHERE id='.$id;
  $query = mysqli_query($connection,$volume);
  $row = mysqli_fetch_array($query);
  ?>
  <?php
  if($_SESSION['aaa'] === 'admin') {
    ?>
    <section id="details_header" class="py-4 mb-4 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mr-auto">
            <a href="volumes.php" class="btn btn-primary btn-block">
              <i class="fa fa-arrow-left"></i> Back To Volumes
            </a>
          </div>
          <div class="col-md-3">
            <?php echo '<a href="deletevolume.php?id='.$id.'" class="btn btn-danger btn-block">'; ?>
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
                <h4>Edit Volume: <?php echo $row['title']; ?></h4>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <label class="font-weight-bold" for="title">Volume Title</label>
                    <input type="text" class="form-control" name="title" <?php echo 'value="'.$row['title'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" <?php echo 'value="'.$row['price'].'"'; ?>>
                  </div>
                  <div class="form-group">
                    <?php
                    $selectid = "SELECT * FROM volumes_in_series WHERE volume_id='$id'";
                    $result_selectid = mysqli_query($connection, $selectid);
                    $rowid = mysqli_fetch_array($result_selectid);
                    $selectseriesid = $rowid['series_id'];

                    $seriesinvolumes = 'SELECT volumes.*,
                    series.primaryname as series
                    FROM volumes
                    INNER JOIN volumes_in_series ON volumes_in_series.volume_id = volumes.id
                    INNER JOIN series ON volumes_in_series.series_id = series.series_id
                    WHERE volume_id='.$id;
                    $resultt = mysqli_query($connection, $seriesinvolumes);
                    $rowww = mysqli_fetch_array($resultt);
                    ?>
                    <label for=""> Curenntly belongs to: <?php echo $rowww['series']; ?> </label>
                  </div>
                  <div class="form-group">
                    <label for="series">Series</label>
                    <select name = "series">
                      <?php
                      $series = 'SELECT * FROM series ORDER BY series_id ASC';
                      $query4 = mysqli_query($connection, $series);
                      echo '<option selected>'.$rowww['series'].'</option>';
                      while ($row3 = mysqli_fetch_array($query4)) {
                        echo '<option value = "'.$row3['series_id'].'">'.$row3['primaryname'].'</option>';
                      } ?>
                    </select>
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

      $title = mysqli_real_escape_string($connection, $_POST['title']);
      $price = $_POST['price'];
      $series = $_POST['series'];

      $volumeupdate = "UPDATE volumes SET title='$title',price='$price' WHERE id='$id'";
      $result_volumeupdate = mysqli_query($connection, $volumeupdate);


      $seriesquery = "UPDATE volumes_in_series SET series_id=replace(series_id, '$selectseriesid', '$series') WHERE volume_id=".$id;
      $result_volume2 = mysqli_query($connection, $seriesquery);

      if($result_volumeupdate) {
        echo "volume has been updated.";
        // echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'">';
      } else {
        echo "you fucked up.";
      }
    }
  } else {
    header('Location: index.php');
  }
} else {
  echo "you forgo something important cunt";
}
?>
<?php include('includes/footer.php'); ?>
