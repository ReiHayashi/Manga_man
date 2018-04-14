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
                <th>Username</th>
                <th>E-mail</th>
                <th>User Type</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $user = 'SELECT * FROM users ORDER BY id DESC';
              $userquery = mysqli_query($connection, $user);
              $manga='SELECT * FROM series ORDER BY series_id DESC';
              $query = mysqli_query($connection,$manga);
              $num_rows = mysqli_num_rows($query);
              $volumes = 'SELECT * FROM volumes ORDER BY id DESC';
              $query2 = mysqli_query($connection, $volumes);
              $num_rows2 = mysqli_num_rows($query2);
              $tickets = 'SELECT * FROM support';
              $query1 = mysqli_query($connection,$tickets);
              $num_rows1 = mysqli_num_rows($query1);
              while ($row = mysqli_fetch_array($userquery)) {
              echo '<tr>';
              echo '<td scope="row">'.$row['id'].'</td>';
              echo '<td>'.$row['username'].'</td>';
              echo '<td>'.$row['email'].'</td>';
              if($row['usertype'] == 1) {
                echo '<td>Admin</td>';
              } else {
                echo '<td>User</td>';
              }
              echo '<td><a href="user_details.php?id='.$row['id'].'" class="btn btn-primary">
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
              <i class="fa fa-bookmark"></i> <?php echo $num_rows2; ?>
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
        <form action="addseries.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="Primaryname" class="form-control">
          </div>
          <div class="form-group">
            <label for="authors">Author/s</label>
            <input type="text" name="Author" class="form-control">
          </div>
          <div class="form-group">
            <label>Start date</label>
            <input type="date" name="start_date" max="3000-12-31"
            min="1000-01-01" class="form-control">
          </div>
          <div class="form-group">
            <label>End date</label>
            <input type="date" name="end_date" max="3000-12-31"
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
            <textarea name="Synopsis" class="form-control"></textarea>
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
        <form action="addvolume.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="price">Title</label>
            <input type="text" name="Title" class="form-control">
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="Price" class="form-control">
          </div>
          <div class="form-group">
            <label for="file">Manga Cover</label>
            <input type="file" name="fileToUpload"><br>
          </div>
          <div class="form-group">
            <label for="series">aaaa</label>
            <select name = "series">
              <?php
              $series = 'SELECT * FROM series ORDER BY series_id ASC';
              $query4 = mysqli_query($connection, $series);
              while ($row3 = mysqli_fetch_array($query4)) {
                echo '<option value = "'.$row3['series_id'].'">'.$row3['primaryname'].'</option>';
              } ?>
            </select>
          </div>
          <div class="modal-footer bg-dark">
            <button class="btn btn-primary" data-dismiss="modal">Close</button>
            <input class="btn btn-primary" type="submit" name="submit2" value="Add volume to the shop">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  } else {
    header('Location: index.php');
  }
?>

<?php include('includes/footer.php'); ?>
