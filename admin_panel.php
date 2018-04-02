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
              <tr>
                <td scope="row">1</td>
                <td>Berserk</td>
                <td>Action, Adventure, Drama, Fantasy</td>
                <td>April 02, 2018</td>
                <td><a href="manga_details.php" class="btn btn-primary">
                  <i class="fa fa-angle-double-right"></i> Details
                </a></td>
              </tr>
              <tr>
                <td scope="row">1</td>
                <td>Berserk</td>
                <td>Action, Adventure, Drama, Fantasy</td>
                <td>April 02, 2018</td>
                <td><a href="manga_details.php" class="btn btn-primary">
                  <i class="fa fa-angle-double-right"></i> Details
                </a></td>
              </tr>
              <tr>
                <td scope="row">1</td>
                <td>Berserk</td>
                <td>Action, Adventure, Drama, Fantasy</td>
                <td>April 02, 2018</td>
                <td><a href="manga_details.php" class="btn btn-primary">
                  <i class="fa fa-angle-double-right"></i> Details
                </a></td>
              </tr>
              <tr>
                <td scope="row">1</td>
                <td>Berserk</td>
                <td>Action, Adventure, Drama, Fantasy</td>
                <td>April 02, 2018</td>
                <td><a href="manga_details.php" class="btn btn-primary">
                  <i class="fa fa-angle-double-right"></i> Details
                </a></td>
              </tr>
              <tr>
                <td scope="row">1</td>
                <td>Berserk</td>
                <td>Action, Adventure, Drama, Fantasy</td>
                <td>April 02, 2018</td>
                <td><a href="manga_details.php" class="btn btn-primary">
                  <i class="fa fa-angle-double-right"></i> Details
                </a></td>
              </tr>
              <tr>
                <td scope="row">1</td>
                <td>Berserk</td>
                <td>Action, Adventure, Drama, Fantasy</td>
                <td>April 02, 2018</td>
                <td><a href="manga_details.php" class="btn btn-primary">
                  <i class="fa fa-angle-double-right"></i> Details
                </a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-center bg-primary text-dark mb-3">
          <div class="card-body">
            <h3>Manga</h3>
            <h1 class="display-4">
              <i class="fa fa-book"></i> 6
            </h1>
            <a href="mangas.php" class="btn btn-dark btn-sm">View</a>
          </div>
        </div>

        <div class="card text-center bg-primary text-dark mb-3">
          <div class="card-body">
            <h3>Tickets</h3>
            <h1 class="display-4">
              <i class="fa fa-pencil"></i> 4
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
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="authors">Author/s</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="authors">Price</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" max="3000-12-31"
            min="1000-01-01" class="form-control">
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select multiple class="form-control">
              <option value="">Action</option>
              <option value="">Adventure</option>
              <option value="">Comdey</option>
              <option value="">Drama</option>
              <option value="">Slice of Life</option>
              <option value="">Fantasy</option>
              <option value="">Magic</option>
              <option value="">Supernatural</option>
              <option value="">Horror</option>
              <option value="">Mystery</option>
              <option value="">Psychological</option>
              <option value="">Romance</option>
              <option value="">Sci-Fi</option>
            </select>
          </div>
          <div class="form-group">
            <label for="language">Languages</label>
            <select multiple class="form-control">
              <option value="">English</option>
              <option value="">Russian</option>
              <option value="">Japanese</option>
              <option value="">Spanish</option>
              <option value="">Italian</option>
              <option value="">French</option>
            </select>
          </div>
          <div class="form-group">
            <label for="body">Synopsis</label>
            <textarea name="editor1" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="file">Image Upload</label>
            <input type="file" class="form-control-file">
            <small class="form-text text-muted">Max size 3MB</small>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-dark">
        <button class="btn btn-primary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" data-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
