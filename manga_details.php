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
<section id="details_header" class="py-4 mb-4 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mr-auto">
        <a href="mangas.php" class="btn btn-primary btn-block">
          <i class="fa fa-arrow-left"></i> Back To Manga
        </a>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn btn-success btn-block">
          <i class="fa fa-check"></i> Save Changes
        </a>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn btn-danger btn-block">
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
            <form>
              <div class="form-group">
                <label class="font-weight-bold" for="title">Title:</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="authors">Author/s:</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="authors">Price:</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="date">Date:</label>
                <input type="date" name="date" max="3000-12-31"
                min="1000-01-01" class="form-control">
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="category">Category:</label>
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
                <label class="font-weight-bold" for="language">Languages:</label>
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
                <label class="font-weight-bold" for="Synopsis">Synopsis:</label>
                <textarea name="editor1" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label class="font-weight-bold" for="file">Image Upload:</label>
                <input type="file" class="form-control-file">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include('includes/footer.php'); ?>
