<?php
$db_server="localhost";
$db_database="mangaman";
$db_user="root";
$db_password="";

$connection = mysqli_connect($db_server, $db_database, $db_user, $db_password);

if(!$connection) {
  die('everything is fucked');
}
?>
