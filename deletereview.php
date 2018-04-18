<?php include("config/config.php"); ?>
<?php
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $deletegenres = "DELETE FROM reviews_in_volumes WHERE review_id=".$id;
  $delete = "DELETE FROM review WHERE id=".$id;
  $delete_result1 = mysqli_query($connection, $deletegenres);
  $delete_result3 = mysqli_query($connection, $delete);
  if($delete_result3){
    echo "Review successfully deleted";
    header('Location: reviews.php');
  } else {
    echo "something went wrong";
  }
} else {
  echo "nigger you forgot to add that thing to get the id hahahahaha";
}
?>
