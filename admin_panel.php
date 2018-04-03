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
if($_SESSION['aaa'] === 'admin') {
?>
<section class="bg-dark">
<div class="container py-2">
  <div class="row">
    <div class="col-mb-6">
      <h1>Dashboard</h1>
    </div>
  </div>
</div>
</section>

<section id="post" class="py-4 mb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
          <i class="fa fa-plus"></i> Add Manga
        </a>
      </div>
    </div>
  </div>
</section>

<section id="posts">
  <div class="container">
    <div class="row">
      <div class="col md-9">
        <div class="card bg-dark">
          <div class="card-header">
            <h4>Latest Manga</h4>
          </div>
          <table class="table table-striped table-dark text-primary">
            <thead class="thead-inverse">
              <tr>
                <th>#</th>
                <th>Manga</th>
                <th>Genre</th>
                <th>Date added</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $queryy = 'SELECT manga.*,
                group_concat(genres.name) as genres
                FROM manga
                INNER JOIN genres_in_mangas ON genres_in_mangas.manga_id = manga.manga_id
                INNER JOIN genres ON genres_in_mangas.genre_id = genres.id';
                $resultt = mysqli_query($connection, $queryy);
                $row_genre = mysqli_fetch_array($resultt);
              $manga='SELECT * FROM manga ORDER BY manga_id DESC';
              $query = mysqli_query($connection,$manga);
              $num_rows = mysqli_num_rows($query);
              $tickets = 'SELECT * FROM support';
              $query1 = mysqli_query($connection,$tickets);
              $num_rows1 = mysqli_num_rows($query1);
              while ($row = mysqli_fetch_array($query)) {
              echo '<tr>';
              echo '<td scope="row">'.$row['manga_id'].'</td>';
              echo '<td>'.$row['manga_name'].'</td>';
              echo '<td>';
              echo substr($row_genre['genres'], 0, 25);
              echo '</td>';
              echo '<td>'.$row['manga_creator'].'</td>';
              echo '<td><a href="manga_details.php?id='.$row['manga_id'].'" class="btn btn-primary">
                <i class="fa fa-angle-double-right"></i>Details</a></td>';
              echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>


      <div class="col-md-3">
        <div class="card text-center bg-primary text-dark mb-3">
          <div class="card-body">
            <h3>Manga</h3>
            <h1 class="display-4">
              <i class="fa fa-book"></i> <?php echo $num_rows; ?>
            </h1>
            <a href="mangas.php" class="btn btn-dark btn-sm">View</a>
          </div>
        </div>
        <div class="card text-center bg-primary text-dark mb-3">
          <div class="card-body">
            <h3>Tickets</h3>
            <h1 class="display-4">
              <i class="fa fa-pencil"></i> <?php echo $num_rows1; ?>
            </h1>
            <a href="tickets.php" class="btn btn-dark btn-sm">View</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="addPostModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Add manga</h5>
        <button class="close" data-dismiss="modal"> <span>&times;</span> </button>
      </div>
      <div class="modal-body bg-dark">
        <form action="" method="POST">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="Title" class="form-control">
          </div>
          <div class="form-group">
            <label for="authors">Author/s</label>
            <input type="text" name="Author" class="form-control">
          </div>
          <div class="form-group">
            <label for="authors">Price</label>
            <input type="text" name="Price" class="form-control">
          </div>
          <div class="form-group">
            <label>Date</label>
            <input type="date" name="Date" max="3000-12-31"
            min="1000-01-01" class="form-control">
          </div>
          <div class="form-group">
            <label for="category">Category</label> <br>
              <?php
              $genres = 'SELECT * FROM genres ORDER BY id ASC';
              $query2 = mysqli_query($connection, $genres);
              while ($row1 = mysqli_fetch_array($query2)) {
                echo '<input type = "checkbox" name = "genre[]" value = "'.$row1['id'].'">'.$row1['name'].'<br>';
              }
              ?>
          </div>
          <div class="form-group">
            <label for="language">Languages</label><br>
              <?php
              $languages = 'SELECT * FROM languages ORDER BY id ASC';
              $query3 = mysqli_query($connection, $languages);
              while ($row2 = mysqli_fetch_array($query3)) {
                echo '<input type = "checkbox" name = "language[]" value = "'.$row2['id'].'">'.$row2['language'].'<br>';
              } ?>
          </div>
          <div class="form-group">
            <label for="body">Synopsis</label>
            <textarea name="Description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="file">Image Upload</label>
            <input type="file" class="form-control-file">
            <small class="form-text text-muted">Max size 3MB</small>
          </div>
          <input type="submit" name="submit" value="Add manga to shop" required> <br>
        </form>
      </div>
      <div class="modal-footer bg-dark">
        <button class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['Title']) && isset($_POST['Author']) && isset($_POST['Price'])
  && isset($_POST['Date']) && isset($_POST['Description'])) {

  $title = $_POST['Title'];
  $author = $_POST['Author'];
  $price = $_POST['Price'];
  $date = $_POST['Date'];
  $description = $_POST['Description'];

  $query11 = "SELECT * FROM manga ORDER BY manga_id DESC";
  $rs = mysqli_query($connection, $query11);
  $row11 = mysqli_fetch_array($rs);
  $mangaid = $row11['manga_id'] + 1;

  $manga = "INSERT INTO manga (manga_id, manga_name, manga_creator, manga_date, manga_description, manga_price)
  VALUES ('$mangaid','$title', '$author', '$date', '$description', '$price')";
  $result_manga = mysqli_query($connection, $manga);

  foreach($_POST['genre'] as $g) {
    $genre = "INSERT INTO genres_in_mangas (genre_id, manga_id) VALUES ('$g', '$mangaid')";
    $result_genre = mysqli_query($connection, $genre);
  }
  foreach($_POST['language'] as $l) {
    $language = "INSERT INTO languages_in_mangas (language_id, manga_id) VALUES ('$l', '$mangaid')";
    $language_result = mysqli_query($connection, $language);
  }

  if($result_manga && $result_genre && $language_result) {
    echo "manga has been added.";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';

  } else {
    echo "you fucked up.";
  }
  }
  } else {
    header('Location: index.php');
  }
?>

<?php include('includes/footer.php'); ?>
