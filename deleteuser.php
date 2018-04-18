<?php include("config/config.php"); ?>
<?php
if(!empty($_GET['id'])){
  $id = $_GET['id'];
  $delete = "DELETE FROM users WHERE id='$id'";
  $delete_result3 = mysqli_query($connection, $delete);
  if( $delete_result3){
    echo "User successfully deleted";
    header('Location: admin_panel.php');
  } else {
    echo "something went wrong";
  }
} else {
  echo "nigger you forgot to add that thing to get the id hahahahaha";
}
?>
