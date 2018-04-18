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
  $user = 'SELECT V.*,
  review.username as U, review.datesubmitted as DS, series.primaryname as PN, review.id as reviewid, review.content as C
  FROM volumes AS V
  INNER JOIN reviews_in_volumes AS RIS ON RIS.volume_id = V.id
  INNER JOIN review ON RIS.review_id = review.id
  INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
  INNER JOIN series ON VIS.series_id = series.series_id
  WHERE review.id='.$id;
  $userquery = mysqli_query($connection, $user);
  $row = mysqli_fetch_array($userquery);
  ?>
  <?php
  if($_SESSION['aaa'] === 'admin') {
    ?>
    <section id="details_header" class="py-4 mb-4 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mr-auto">
            <a href="admin_panel.php" class="btn btn-primary btn-block">
              <i class="fa fa-arrow-left"></i> Back To Dashboard
            </a>
          </div>
          <div class="col-md-3">
            <?php echo '<a href="deletereview.php?id='.$id.'" class="btn btn-danger btn-block">'; ?>
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
                <h4>Edit review for: <?php echo $row['PN'].' '.$row['title'].'<br> Review by: '.$row['U']; ?></h4>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-group">
                    <label class="font-weight-bold" for="Synopsis">Content:</label>
                    <textarea class="form-control" name="content" ><?php echo $row['C']; ?></textarea>
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

      $content = $_POST['content'];

      $userupdate = "UPDATE review SET content='$content' WHERE id='$id'";
      $result_userupdate = mysqli_query($connection, $userupdate);


      if($result_userupdate) {
        echo "review has been updated.";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'?id='.$_GET['id'].'">';

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
