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
<section id="view_manga">
  <div class="container">
    <div class="row">
      <div class="col-md-3 bg-dark my-4 rounded-left">
        <a href=""><img src="img/berserk.jpg" class="img-fluid py-2"></a>
      </div>
      <div class="col-md-7 bg-dark my-4">
        <h4>Berserk Volume 1: The Black Swordsman</h4>
        <ul class="list-inline">
          <li class="list-inline-item">By:</li>
          <li class="list-inline-item">Kentaro Miura</li>
        </ul>
        <ul class="list-inline">
          <li class="list-inline-item">Language:</li>
          <li class="list-inline-item">English</li>
        </ul>
        <p style="font-size:14px;">Guts, a former mercenary now known as the "Black Swordsman," is out for revenge. After a tumultuous childhood, he finally finds someone he respects and believes he can trust, only to have everything fall apart when this person takes away everything important to Guts for the purpose of fulfilling his own desires. Now marked for death, Guts becomes condemned to a fate in which he is relentlessly pursued by demonic beings.
          <br>
          Setting out on a dreadful quest riddled with misfortune, Guts, armed with a massive sword and monstrous strength, will let nothing stop him, not even death itself, until he is finally able to take the head of the one who stripped him—and his loved one—of their humanity. </p>
        </div>
        <div class="col-md-2 bg-dark my-4 text-center rounded-right">
          <h2 style="margin-top:60px;" >9.99$</h2>
          <p class="my-2">Free shipping Worldwide</p>
          <a class="btn btn-primary btn-lg btn-block d-inline-block mt-3" href="logout.php" role="button">Add to cart</a> <br>
          <a class="btn btn-primary btn-lg btn-block d-inline-block mt-3" href="logout.php" role="button">Wishlist</a> <br>
        </div>
      </div>
      <dl class="row my bg-dark rounded">
        <dt class="col-sm-3 my-2">Title:</dt>
        <dd class="col-sm-8 my-2">Berserk</dd>

        <dt class="col-sm-3 my-2">Langauge:</dt>
        <dd class="col-sm-8 my-2">English</dd>

        <dt class="col-sm-3 my-2">Author:</dt>
        <dd class="col-sm-8 my-2">Kentaro Miura</dd>

        <dt class="col-sm-3 my-2">Publication date:</dt>
        <dd class="col-sm-8 my-2">Aug 25, 1989 to ?</dd>

        <dt class="col-sm-3 my-2">Genres:</dt>
        <dd class="col-sm-8 my-2">
          <ul class="list-inline">
            <li class="list-inline-item">Fantasy</li>
            <li class="list-inline-item">Horror</li>
            <li class="list-inline-item">Action</li>
            <li class="list-inline-item">Adventure</li>
          </ul>
        </dd>
      </dl>
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

<?php include('includes/footer.php'); ?>
