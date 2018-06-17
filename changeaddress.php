
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

if(mysqli_num_rows($resulttt) == 1) {
?>
<!-- CHANGE ADDRESS -->

<section id="checkout">
  <form action="" method="post">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4 bg-dark rounded" style="margin-top: 100px;">
          <h1 class="display-5 text-center">Address update</h1>
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
            <input href="#" class="btn btn-primary" type="submit" value="Update" name="submit">
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
    //järgmine kontroll
  if(isset($_POST['submit'])){
    //muutujad vormist
  $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
  $address1 = mysqli_real_escape_string($connection, $_POST['address1']);
  $address2 = mysqli_real_escape_string($connection, $_POST['address2']);
  $city = mysqli_real_escape_string($connection, $_POST['city']);
  $country = mysqli_real_escape_string($connection, $_POST['country']);
  $postcode = mysqli_real_escape_string($connection, $_POST['postcode']);
  //päring
  $addressupdate = "UPDATE address SET firstname='$firstname', lastname='$lastname',
                                       address1='$address1', address2='$address2',
                                       city='$city', country='$country', postcode='$postcode'
                    WHERE id='$addressid'";
  $result_addressupdate = mysqli_query($connection, $addressupdate);
  if($result_addressupdate) {
    echo '<p class="display-5 text-center">Address successfully updated<p>';
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';
  } else {
    echo '<p class="display-5 text-center">Something went wrong.<p>';
  }
}
}
} else {
  header('Location: index.php');
}
?>
<?php include('includes/footer.php'); ?>
