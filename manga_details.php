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
  <?php
  if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $manga='SELECT * FROM manga ORDER BY manga_id DESC';
  $query = mysqli_query($connection,$manga);
  $row = mysqli_fetch_array($query);
  ?>
  <?php
  if($_SESSION['aaa'] === 'admin') {
  ?>
<section id="details_header" class="py-4 mb-4 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mr-auto">
        <a href="mangas.php" class="btn btn-primary btn-block">
          <i class="fa fa-arrow-left"></i> Back To Manga
        </a>
      </div>
      <div class="col-md-3">
          <?php echo '<a href="deletemanga.php?id='.$id.'" class="btn btn-danger btn-block">'; ?>
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
            <h4>Edit Manga</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <label class="font-weight-bold" for="title">Title:</label>
                <input type="text" class="form-control" name="Title" <?php echo 'value="'.$row['manga_name'].'"'; ?>>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="authors">Author/s:</label>
                <input type="text" class="form-control" name="Author" <?php echo 'value="'.$row['manga_creator'].'"'; ?>>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="authors">Price:</label>
                <input type="text" class="form-control" name="Price" <?php echo 'value="'.$row['manga_price'].'"'; ?>>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="date">Date:</label>
                <input type="date" name="Date" max="3000-12-31"
                min="1000-01-01" class="form-control" <?php echo 'value="'.$row['manga_date'].'"'; ?>>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="Synopsis">Synopsis:</label>
                <textarea class="form-control" name="Description" ><?php echo $row['manga_description']; ?></textarea>
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
  if(isset($_POST['submit']) && isset($_POST['Title']) && isset($_POST['Author']) && isset($_POST['Price'])
  && isset($_POST['Date']) && isset($_POST['Description'])) {

  $title = $_POST['Title'];
  $author = $_POST['Author'];
  $price = $_POST['Price'];
  $date = $_POST['Date'];
  $description = $_POST['Description'];

  $manga = "UPDATE manga SET manga_name='$title',manga_creator='$author',manga_date='$date',manga_description='$description',manga_price='$price' WHERE manga_id='$id'";
  $result_manga = mysqli_query($connection, $manga);


  if($result_manga) {
    echo "manga has been updated.";
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
