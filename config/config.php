<?php
$db_server="localhost";
$db_database="mangaman";
$db_user="root";
$db_password="";
$connection = mysqli_connect($db_server, $db_user, $db_password, $db_database);
if(!$connection) {
  die('Something went horribly wrong');
}
$errors = array();
function output_errors($errors){
 return '<ul><li>' .implode('</li><li>', $errors) .'</li></ul>';
}
?>
