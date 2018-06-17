<?php
session_start();
include("config/config.php");
if($_SESSION['aaa'] === 'admin') {
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $deletegenres = "DELETE FROM genres_in_mangas WHERE manga_id='$id'";
  $deletelanguages = "DELETE FROM languages_in_mangas WHERE manga_id='$id'";
  $delete = "DELETE FROM manga WHERE manga_id='$id'";
  $delete_result1 = mysqli_query($connection, $deletegenres);
  $delete_result2 = mysqli_query($connection, $deletelanguages);
  $delete_result3 = mysqli_query($connection, $delete);
  if($delete_result1 && $delete_result2 && $delete_result3){
    echo "Manga successfully deleted";
    header('Location: mangas.php');
  } else {
    echo "something went wrong";
  }
} else {
  echo "Error 404: This manga doesnt exist.";
}
} else {
  header('Location: index.php');
}
