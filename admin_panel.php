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
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addseries">
          <i class="fa fa-plus"></i> Add series
        </a>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addvolume">
          <i class="fa fa-plus"></i> Add volume
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
            <h4>Latest series</h4>
          </div>
          <table class="table table-striped table-dark text-primary">
            <thead class="thead-inverse">
              <tr>
                <th>#</th>
                <th>Name</th>
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
            <h3>Series</h3>
            <h1 class="display-4">
              <i class="fa fa-book"></i> <?php echo $num_rows; ?>
            </h1>
            <a href="series.php" class="btn btn-dark btn-sm">View</a>
          </div>
        </div>
        <div class="card text-center bg-primary text-dark mb-3">
          <div class="card-body">
            <h3>Volumes</h3>
            <h1 class="display-4">
              <i class="fa fa-bookmark"></i> <?php echo $num_rows; ?>
            </h1>
            <a href="volumes.php" class="btn btn-dark btn-sm">View</a>
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

<div class="modal fade" id="addseries">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Add series</h5>
        <button class="close" data-dismiss="modal"> <span>&times;</span> </button>
      </div>
      <div class="modal-body bg-dark">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="Title" class="form-control">
          </div>
          <div class="form-group">
            <label for="authors">Author/s</label>
            <input type="text" name="Author" class="form-control">
          </div>
          <div class="form-group">
            <label>Start date</label>
            <input type="date" name="Date" max="3000-12-31"
            min="1000-01-01" class="form-control">
          </div>
          <div class="form-group">
            <label>End date</label>
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
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal">Close</button>
            <input class="btn btn-primary" type="submit" name="submit" value="Add series to database">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addvolume">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title">Add volume</h5>
        <button class="close" data-dismiss="modal"> <span>&times;</span> </button>
      </div>
      <div class="modal-body bg-dark">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="Price" class="form-control">
          </div>
          <div class="form-group">
            <label for="file">Manga Cover</label>
            <input type="file" name="fileToUpload"><br>
          </div>
          <div class="modal-footer bg-dark">
            <button class="btn btn-primary" data-dismiss="modal">Close</button>
            <input class="btn btn-primary" type="submit" name="submit" value="Add volume to the shop">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['Title']) && isset($_POST['Author']) && isset($_POST['Price'])
  && isset($_POST['Date']) && isset($_POST['Description'])) {
    if(!empty($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    } else {
      echo "you're a faggot";
    }

  $title = $_POST['Title'];
  $author = $_POST['Author'];
  $price = $_POST['Price'];
  $date = $_POST['Date'];
  $description = $_POST['Description'];
  $image = $_FILES["fileToUpload"]["name"];

  $query11 = "SELECT * FROM manga ORDER BY manga_id DESC";
  $rs = mysqli_query($connection, $query11);
  $row11 = mysqli_fetch_array($rs);
  $mangaid = $row11['manga_id'] + 1;

  $manga = "INSERT INTO manga (manga_id, manga_name, manga_creator, manga_date, manga_description, manga_price, image)
  VALUES ('$mangaid','$title', '$author', '$date', '$description', '$price', '$image')";
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
    // echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';

  } else {
    echo "you fucked up.";
  }
  }
  } else {
    header('Location: index.php');
  }
?>

<?php include('includes/footer.php'); ?>
