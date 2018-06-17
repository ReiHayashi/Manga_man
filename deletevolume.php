<?php
session_start();
include("config/config.php");
if($_SESSION['aaa'] === 'admin') {
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $deletegenres = "DELETE FROM volumes_in_series WHERE volume_id=".$id;
  $delete = "DELETE FROM volumes WHERE id=".$id;
  $delete_result1 = mysqli_query($connection, $deletegenres);
  $delete_result3 = mysqli_query($connection, $delete);
  if($delete_result3){
    echo "Volume successfully deleted";
    header('Location: volumes.php');
  } else {
    echo "something went wrong";
  }
} else {
  echo "nigger you forgot to add that thing to get the id hahahahaha";
}
} else {
  header('Location: index.php');
}
