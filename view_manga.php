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
//id check
if(!empty($_GET['id'])){
$id = $_GET['id'];
//manga query
$manga='SELECT * FROM manga WHERE manga_id='.$id.'';
$query = mysqli_query($connection,$manga);
$row = mysqli_fetch_array($query);

//genre query
$queryy = 'SELECT manga.*,
group_concat(genres.name) as genres
FROM manga
INNER JOIN genres_in_mangas ON genres_in_mangas.manga_id = manga.manga_id
INNER JOIN genres ON genres_in_mangas.genre_id = genres.id
WHERE manga.manga_id = '.$id.'';
$resultt = mysqli_query($connection, $queryy);

//language query
$query22 = 'SELECT manga.*,
group_concat(languages.language) as languages
FROM manga
INNER JOIN languages_in_mangas ON languages_in_mangas.manga_id = manga.manga_id
INNER JOIN languages ON languages_in_mangas.language_id = languages.id
WHERE manga.manga_id = '.$id.'';
$result22 = mysqli_query($connection, $query22);
?>
<section id="view_manga">
  <div class="container">
    <div class="row">
      <div class="col-md-3 bg-dark my-4 rounded-left">
        <?php echo '<a href=""><img src="uploads/'.$row['image'].'" class="img-fluid py-2"></a>'; ?>
      </div>
      <div class="col-md-7 bg-dark my-4">
        <?php echo '<h4>'.$row['manga_name'].'</h4>'; ?>
        <ul class="list-inline">
          <li class="list-inline-item">By:</li>
          <?php  echo '<li class="list-inline-item">'.$row['manga_creator'].'</li>'; ?>
        </ul>
        <ul class="list-inline">
          <li class="list-inline-item">Release date:</li>
          <?php  echo '<li class="list-inline-item">'.$row['manga_date'].'</li>'; ?>
        </ul>
        <ul class="list-inline">
          <li class="list-inline-item">Languages:</li>
          <?php
          while ($row_language = mysqli_fetch_array($result22)) {
              echo '<li class="list-inline-item">'.$row_language['languages'].'</li>';
          }
          ?>
        </ul>
        <ul class="list-inline">
          <li class="list-inline-item">Genres:</li>
          <?php
          while ($row_genre = mysqli_fetch_array($resultt)) {
              echo '<li class="list-inline-item">'.$row_genre['genres'].'</li>';
          }
          ?>
        </ul>
        <h5>Description</h5>
        <?php echo '<p style="font-size:14px;">'.$row['manga_description'].'</p>'; ?>
        </div>
        <div class="col-md-2 bg-dark my-4 text-center rounded-right">
          <?php echo '<h2 style="margin-top:60px;" >$'.$row['manga_price'].'</h2>'; ?>
          <p class="my-2">Free shipping Worldwide</p>
          <a class="btn btn-primary btn-lg btn-block d-inline-block mt-3" href="#" role="button">Add to cart</a> <br>
          <a class="btn btn-primary btn-lg btn-block d-inline-block mt-3" href="#" role="button">Wishlist</a> <br>
        </div>
      </div>
      <div class="row">
        <div class="col my-2 rounded text-center">
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPostModal">
            <i class="fa fa-pencil"></i> Post review
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 offset-md-1 card my-4 bg-dark">
          <div class="card-header">
            Timoke
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique neque, impedit delectus iste molestias aut fuga, quas asperiores ipsa nesciunt?</p>
              <footer class="blockquote-footer">Posted on 4/3/2018</footer>
            </blockquote>
          </div>
        </div>
        <div class="col-md-10 offset-md-1 card my-4 bg-dark">
          <div class="card-header">
            Timoke
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt libero unde enim eligendi. Consequuntur at nihil odit ducimus, quia nam.</p>
              <footer class="blockquote-footer">Posted on 4/3/2018</footer>
            </blockquote>
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
        <h5 class="modal-title">Post Review</h5>
        <button class="close" data-dismiss="modal"> <span>&times;</span> </button>
      </div>
      <div class="modal-body bg-dark">
        <form>
          <div class="form-group">
            <label for="body">Synopsis</label>
            <textarea name="editor1" class="form-control" style="min-height: 20%"></textarea>
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
<?php
} else {
  echo "you forgo something important cunt";
}
?>

<?php include('includes/footer.php'); ?>
