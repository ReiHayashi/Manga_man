
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
<section class="bg-dark">
<div class="container py-2">
  <div class="row">
    <div class="col-mb-6">
      <h1>Series</h1>
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
          <input type="text" class="form-control" palceholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-primary">Search</button>
          </span>
        </div>
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
            <h4>All Series</h4>
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
              $series='SELECT * FROM series ORDER BY series_id ASC';
              $query = mysqli_query($connection,$series);
              $num_rows = mysqli_num_rows($query);
              while ($row = mysqli_fetch_array($query)) {
              echo '<tr>';
              echo '<td scope="row">'.$row['series_id'].'</td>';
              echo '<td>'.$row['primaryname'].'</td>';
              echo '<td>placeholder for now</td>';
              echo '<td>'.$row['author'].'</td>';
              echo '<td><a href="series_details.php?id='.$row['series_id'].'" class="btn btn-primary">
                <i class="fa fa-angle-double-right"></i>Details</a></td>';
              echo '</tr>';
              }
              ?>
            </tbody>
          </table>
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
    </div>
  </div>
</section>

<?php include('includes/footer.php'); ?>
