<?php
session_start();
include("config/config.php");
if($_SESSION['aaa'] === 'admin') {?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>deleteseries</title>
  </head>
  <body>
<?php
if(!empty($_GET['id'])){
  //muutuja 'id' mis on veebilehe aadressil kirjas
  $id = $_GET['id'];
  //andmebaasi päringud
  $deletegenres = "DELETE FROM genres_in_series WHERE series_id='$id'";
  $deletelanguages = "DELETE FROM languages_in_series WHERE series_id='$id'";
  $deletevolumes = "DELETE FROM volumes_in_series WHERE series_id='$id'";
  $delete = "DELETE FROM series WHERE series_id='$id'";
  $delete_result1 = mysqli_query($connection, $deletegenres);
  $delete_result2 = mysqli_query($connection, $deletelanguages);
  $delete_result3 = mysqli_query($connection, $delete);
  $delete_result4 = mysqli_query($connection, $deletevolumes);
  //kui kõik läks läbi siis kuvatakse järgmise sõnumi
  if($delete_result1 && $delete_result2 && $delete_result3 && $delete_result4){
    echo "<h1>Success Series has been deleted</h1><br><p> You will be taken back to series in 5 seconds</p>";
    header( "refresh:5;url=series.php" );
  }
  // juhul kui midagi läks valesti kuvatakse järgmine sõnum
  else {
    echo "<h1>Error 500</h1> <br>";
    echo "<p>Internal server error, please try again later.</p>"
  }
} else {
  echo "<h1> Error 404</h1>";
  echo "<p> Series not found </p>";
}
} else {
  header('Location: index.php');
}
?>
