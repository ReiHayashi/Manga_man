<?php
session_start();
include("config/config.php");
if($_SESSION['aaa'] === 'admin') {
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $delete = "DELETE FROM support WHERE support_id='$id'";
  $delete_result = mysqli_query($connection, $delete);
  if($delete_result){
    echo "support ticket deleted";
    header('Location: tickets.php');
  } else {
    echo "something went wrong";
  }
}
} else {
  header('Location: index.php');
}
