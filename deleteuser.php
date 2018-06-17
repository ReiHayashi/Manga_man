<?php
session_start();
 include("config/config.php"); ?>
<?php
if (isset($_SESSION['aaa']) && $_SESSION['aaa'] === 'admin') {
  if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $selectid = "SELECT * FROM address_in_users WHERE user_id='$id'";
    $select_result = mysqli_query($connection, $selectid);
    $row = mysqli_fetch_array($select_result);
    $addressid = $row['address_id'];

    $selectusername = "SELECT * FROM users WHERE id='$id'";
    $selectuser_result = mysqli_query($connection, $selectusername);
    $row1 = mysqli_fetch_array($selectuser_result);
    $username = $row1['username'];

    $selectreviewid = "SELECT * FROM review WHERE username='$username'";
    $selectreviewid_result = mysqli_query($connection, $selectreviewid);
    $row2 = mysqli_fetch_array($selectreviewid_result);
    $review_id = $row2['id'];

    $delete = "DELETE FROM users WHERE id='$id'";

  if(mysqli_num_rows($select_result) == 1) {
    $delete2 = "DELETE FROM address_in_users WHERE user_id='$id'";
    $delete3 = "DELETE FROM address WHERE address_id='$addressid'";
    $delete_result1 = mysqli_query($connection, $delete2);
    $delete_result2 = mysqli_query($connection, $delete3);
    $delete_result3 = mysqli_query($connection, $delete);
    if($delete_result3){

      echo "User successfully deleted";
      header('Location: admin_panel.php');

    } else {

      echo "something went wrong";

    }
    } else {

      $delete_result3 = mysqli_query($connection, $delete);
      if($delete_result3){

        echo "User successfully deleted";
        header('Location: admin_panel.php');

      } else {

        echo "something went wrong";
      }
    }
  } else {
    echo "nigger you forgot to add that thing to get the id hahahahaha";
  }
  } else {
    header('Location: admin_panel.php');
  }
  ?>
