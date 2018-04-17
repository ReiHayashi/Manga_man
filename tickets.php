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

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
?>
<?php
if($_SESSION['aaa'] === 'admin') {
?>
<section class="bg-dark">
<div class="container py-2">
  <div class="row">
    <div class="col-mb-6">
      <h1>Tickets</h1>
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
            <h4>All tickets</h4>
          </div>
          <table class="table table-striped table-dark text-primary">
            <thead class="thead-inverse">
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Date added</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no_of_records_per_page = 10;
              $offset = ($page-1) * $no_of_records_per_page;
              $user="SELECT * FROM support ORDER BY support_id DESC LIMIT $offset, $no_of_records_per_page";
              $query = mysqli_query($connection,$user);
              //pagination
              $yesyesyes = "SELECT COUNT('support_id') FROM support";
              $yesyesyes_result = mysqli_query($connection, $yesyesyes);
              $total_rows = mysqli_fetch_array($yesyesyes_result)[0];
              $total_pages = ceil($total_rows / $no_of_records_per_page);
              while ($row = mysqli_fetch_array($query)) {
                echo '<tr>';
                echo '<td scope="row">'.$row['support_id'].'</td>';
                echo '<td>'.$row['problem_title'].'</td>';
                echo '<td>'.$row['firstname'].' '.$row['lastname'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>Placeholder</td>';
                echo '<td><a href="ticket_details.php?id='.$row['support_id'].'" class="btn btn-primary">
                      <i class="fa fa-angle-double-right"></i> View</a></td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
          <!-- PAGINATION SHIT THAT WORKS AAAAAAAAAAAAAAA -->
            <nav>
              <ul class="pagination justify-content-center">
                  <?php if($page == 1) {} else {?>
                  <li class="page-item "><a class="page-link" href="?page=1">First</a></li>
                <?php } ?>
                  <li class="<?php if($page == 1){ echo 'disabled'; } ?> page-item">
                      <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?> " tabindex="-1">Previous</a>
                  </li>
                </li>

                <?php
                if ($total_pages >= 1) {
          	       for ($i=1; $i<=$total_pages ; $i++) {
          		         if ($i==$page) {
          			            echo "<li class=\"page-item\"><b><a class=\"page-link\" href=\"?page=$i\">$i</a></b></li> ";
          		              } else {
          			                 echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?page=$i\">$i</a></li> ";
          		                   }

          	                    }
                              }?>
                <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?> page-item">
                    <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
                </li>
                <?php if($page == $total_pages) { } else {?>
              <li class="page-item"><a class="page-link"  href="?page=<?php echo $total_pages; ?>">Last</a></li>
              <?php } ?>
              </ul>
            </nav>
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
