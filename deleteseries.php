<?php include("config/config.php"); ?>
<?php
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $deletegenres = "DELETE FROM genres_in_series WHERE series_id='$id'";
  $deletelanguages = "DELETE FROM languages_in_series WHERE series_id='$id'";
  $deletevolumes = "DELETE FROM volumes_in_series WHERE series_id='$id'";
  $delete = "DELETE FROM series WHERE series_id='$id'";
  $delete_result1 = mysqli_query($connection, $deletegenres);
  $delete_result2 = mysqli_query($connection, $deletelanguages);
  $delete_result3 = mysqli_query($connection, $delete);
  $delete_result4 = mysqli_query($connection, $deletevolumes);
  if($delete_result3){
    echo "Series successfully deleted";
    header('Location: series.php');
  } else {
    echo "something went wrong";
  }
} else {
  echo "nigger you forgot to add that thing to get the id hahahahaha";
}
?>
