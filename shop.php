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
<section id="shop">
  <form action="" method="post">
    <div class="container">
      <div class="row">
        <div class="col-3 bg-dark my-3 rounded">

          <label for="username">Keyword</label>
          <input type="text" name="text" class="form-control">

          <label class="my-2">Price range</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>All</option>
            <option value="1">Under €15</option>
            <option value="2">€15 to 30€</option>
            <option value="3">€30 +</option>
          </select>

          <label class="my-2">Availability</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>All</option>
            <option value="1">In stockr</option>
            <option value="1">Pre-order</option>
          </select>

          <label class="my-2">Langauge</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>English</option>
            <option value="1">Japanese</option>
            <option value="2">French</option>
            <option value="3">Italian</option>
            <option value="3">German</option>
            <option value="3">Spanish</option>
          </select>

          <label class="my-2">Genre</label>
          <select class="custom-select my-1 mr-sm-2">
            <option selected>Choose</option>
            <option value="1">Action</option>
            <option value="2">Adventure</option>
            <option value="3">Comdey</option>
            <option value="3">Drama</option>
            <option value="3">Slice of Life</option>
            <option value="3">Fantasy</option>
            <option value="3">Magic</option>
            <option value="3">Supernatural</option>
            <option value="3">Horror</option>
            <option value="3">Mystery</option>
            <option value="3">Psychological</option>
            <option value="3">Romance</option>
            <option value="3">Sci-Fi</option>
          </select>
          <div class="wrapper py-2">
            <input href="#" class="btn btn-primary" id="shop_button" placeholder="Refine results" type="submit" style="color:#343a40">
          </div>
        </div>

        <div class="col-lg-9 my-3">
          <div class="card-deck">
            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>


            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-9  offset-lg-3 py-3">
          <div class="card-deck">
            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>


            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-9 offset-lg-3 my-3">
          <div class="card-deck">
            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>


            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-9 offset-lg-3 my-3">
          <div class="card-deck">
            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>


            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-9 offset-lg-3 my-3">
          <div class="card-deck">
            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>

            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>


            <div class="card text-center" style="background-color:black">
              <div class="card-body text-center">
                <a href=""><img src="img/berserk.jpg" alt="" class="img-fluid mb-3"></a>
                <a href="" ><h4>Berserak</h4></a>
                <a href="" class="text-info"><p>Kentafasfasfasgro Miura</p></a>
                <p>9.99$</p>
              </div>
              <div class="card-footer">
                <button class="btn btn-info">ADD TO CART</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav aria-label="Page navigation example">

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
</form>
</section>
<?php include('includes/footer.php'); ?>
