
<?php
session_start();
if (isset($_SESSION['aaa'])&& $_SESSION['aaa']=='admin') {
  include('includes/adminheader.php');
}
elseif (isset($_SESSION['aaa'])&& $_SESSION['aaa']=='user'){
  include('includes/userheader.php');
} else {
  header('Location: login.php');
}

?>


<?php if(!empty($_GET['id'])) {
  $id = $_GET['id'];
  $username = $_SESSION['username'];
  $selectuserid = "SELECT * FROM users WHERE username='$username'";
  $result3 = mysqli_query($connection, $selectuserid);
  $row2 = mysqli_fetch_array($result3);
  $userid = $row2['id'];
  $seriesinvolumes = 'SELECT V.*,
  series.primaryname as S, series.author as A, series.start_date as SD, series.end_date as ED, series.synopsis as Synopsis, series.series_id as sid
  FROM volumes AS V
  INNER JOIN volumes_in_series AS VIS ON VIS.volume_id = V.id
  INNER JOIN series ON VIS.series_id = series.series_id
  WHERE V.id='.$id;
  $resulttt = mysqli_query($connection, $seriesinvolumes);
  $row = mysqli_fetch_array($resulttt);
  //address query
  $queryy = 'SELECT address.*,
  users.username as U,
  FROM address
  INNER JOIN address_in_users ON address_in_users.address_id = series.address_id
  INNER JOIN users ON address_in_users.user_id = users.id
  WHERE address_in_users.user_id = '.$userid;
  $resultt = mysqli_query($connection, $queryy);
  $queryyy = 'SELECT * FROM address_in_users WHERE user_id = '.$userid;
  $resulttt = mysqli_query($connection, $queryyy);
 ?>
  <!-- CHECKOUT -->
  <?php
  echo '<h2 class="display-5 text-center">You\'re currently purchasing:</h2>
        <h4 class="display-5 text-center"> '.$row['S'] .' '.$row['title'].'</h4>';
        if(mysqli_num_rows($resulttt) == 0 ){
  ?>
  <section id="checkout">
    <form action="" method="post">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-10 col-lg-8 bg-dark rounded mt-4">
            <h1 class="display-5 text-center">Checkout</h1>
            <div class="form-group">
              <label>First name*</label>
              <input type="text" class="form-control" name="firstname" required>
            </div>
            <div class="form-group">
              <label>Last name*</label>
              <input type="text" class="form-control" name="lastname" required>
            </div>
            <div class="form-group">
              <label>Address line 1*</label>
              <input type="text" class="form-control" name="address1" required>
            </div>
            <div class="form-group">
              <label>Address line 2</label>
              <input type="text" class="form-control" name="address2" >
            </div>
            <div class="form-group">
              <label>Town/City*</label>
              <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group">
              <label>Country*</label>
              <select class="form-control" name="country" required>
                <?php
                $queryforcountries = "SELECT * FROM countries";
                $resultforcountries = mysqli_query($connection, $queryforcountries);
                while($row5 = mysqli_fetch_array($resultforcountries)) {
                  echo '<option value ="'.$row5['country_name'].'">'.$row5['country_name'].'</option>';
                } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Postcode/Zip*</label>
              <input type="number" class="form-control" name="postcode" required>
            </div>
            <div class="wrapper py-2">
              <input href="#" class="btn btn-primary" type="submit" value="Buy" name="submit">
            </div>
          </div>
        </div>
      </div>
    </form>

  </section>

  <?php
  // kui kõik andmed on sisestatud siis jookse läbi järgmist koodi
  if(isset($_POST['firstname']) && isset($_POST['lastname']) &&
    isset($_POST['address1']) && isset($_POST['city']) &&
    isset($_POST['country']) && isset($_POST['postcode'])) {
    //muutujad vormist
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $address1 = mysqli_real_escape_string($connection, $_POST['address1']);
    $address2 = mysqli_real_escape_string($connection, $_POST['address2']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $postcode = mysqli_real_escape_string($connection, $_POST['postcode']);
    //päring
    $querycheck = "SELECT * FROM address ORDER BY id DESC";
    $result1 = mysqli_query($connection, $querycheck);
    $row1 = mysqli_fetch_array($result1);
    $addressid = $row1['id'] + 1;
    $query="INSERT INTO address (id, firstname, lastname, address1, address2, city, country, postcode)
    VALUES ('$addressid', '$firstname', '$lastname', '$address1', '$address2', '$city', '$country', '$postcode')";
    $result = mysqli_query($connection, $query);
    $addresstouser = "INSERT INTO address_in_users (address_id, user_id) VALUES ('$addressid', '$userid')";
    $result2 = mysqli_query($connection, $addresstouser);
    $purchases = "INSERT INTO purchases (manga_id, username) VALUES ('$id', '$username')";
    $result4 = mysqli_query($connection, $purchases);
    //kui päring õnnestus siis teha järgmine päring
    if($result && $result2 && $result4) {
      echo "<p class='display-5 text-center' >order successfully placed, there is supposed to be a button with bank pay option now somewhere haha</p>";
    }
    //kui päring ebaõnnestus
    else {
      echo "something went wrong, try again later.";
    }
  }
} else {
  $username = $_SESSION['username'];
  $selectuserid = "SELECT * FROM users WHERE username='$username'";
  $result3 = mysqli_query($connection, $selectuserid);
  $row2 = mysqli_fetch_array($result3);
  $userid = $row2['id'];
  $queryyy = 'SELECT * FROM address_in_users WHERE user_id = '.$userid;
  $resulttt = mysqli_query($connection, $queryyy);
  $row3 = mysqli_fetch_array($resulttt);
  $addressid = $row3['address_id'];
  $queryforaddress = "SELECT * FROM address WHERE id='$addressid'";
  $resultforaddress = mysqli_query($connection, $queryforaddress);
  $row4 = mysqli_fetch_array($resultforaddress);

  ?>
  <section id="checkout">
    <form action="" method="post">
      <div class="vertical-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-10 col-lg-8 bg-dark rounded">
            <h1 class="display-5 text-center">Checkout</h1>
            <div class="form-group">
              <label>First name*</label>
              <input type="text" class="form-control" name="firstname" <?php echo 'value="'.$row4['firstname'].'"'; ?> required>
            </div>
            <div class="form-group">
              <label>Last name*</label>
              <input type="text" class="form-control" name="lastname" <?php echo 'value="'.$row4['lastname'].'"'; ?> required>
            </div>
            <div class="form-group">
              <label>Address line 1*</label>
              <input type="text" class="form-control" name="address1" <?php echo 'value="'.$row4['address1'].'"'; ?> required>
            </div>
            <div class="form-group">
              <label>Address line 2</label>
              <input type="text" class="form-control" name="address2" <?php echo 'value="'.$row4['address2'].'"'; ?>>
            </div>
            <div class="form-group">
              <label>Town/City*</label>
              <input type="text" class="form-control" name="city" <?php echo 'value="'.$row4['city'].'"'; ?> required>
            </div>
            <div class="form-group">
              <label>Country*</label>
              <select class="form-control" name="country" required>
              <?php
              $queryforcountries = "SELECT * FROM countries";
              $resultforcountries = mysqli_query($connection, $queryforcountries);
              echo '<option selected>'.$row4['country'].'</option>';
              while($row5 = mysqli_fetch_array($resultforcountries)) {
                echo '<option value ="'.$row5['country_name'].'">'.$row5['country_name'].'</option>';
              } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Postcode/Zip*</label>
              <input type="number" class="form-control" name="postcode" <?php echo 'value="'.$row4['postcode'].'"'; ?>  required>
            </div>
            <div class="wrapper py-2">
              <input href="#" class="btn btn-primary" type="submit" value="Buy" name="submit">
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>

  </section>
<?php
// kui kõik andmed on sisestatud siis jookse läbi järgmist koodi
if(isset($_POST['submit'])) {
  //päring
  $purchases = "INSERT INTO purchases (manga_id, username) VALUES ('$id', '$username')";
  $result4 = mysqli_query($connection, $purchases);
  //kui päring õnnestus siis teha järgmine päring
  if($result4) {
    echo "<p class='display-5 text-center' >Your order is on the way.</p>";
  }
  //kui päring ebaõnnestus
  else {
    echo "something went wrong, try again later.";
  }
}
}
} else {
  echo '<h1 class="display-5 text-center">ERROR 404: You shouldn\'t be seeing this, make sure you didn\'t click somewhere you weren\'t supposed to!</h1> <br> <p class="display-5 text-center">if this keeps happening contact us!</p>';
}  ?>
<?php include('includes/footer.php'); ?>
