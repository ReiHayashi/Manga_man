<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>admin page</title>
  </head>
  <body>
    <?php
    session_start();
    if($_SESSION['aaa'] === 'admin') {
    ?>
    <a href="admin.php"> admin page</a> <br>
    <a href="logout.php"> emergency logout</a> <br>
    <h3>Users</h3>
    <table id="admintable">
      <tr>
        <td>Id</td>
        <td>Username</td>
        <td>Email</td>
        <td>usertype</td>
      </tr>
      <?php
        $user='SELECT * FROM users ORDER BY id DESC';
        $query = mysqli_query($connection,$user);
        while ($row = mysqli_fetch_array($query)) {
          echo '<tr>';
          echo '<td>'.$row['id'].'</td>';
          echo '<td>'.$row['username'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>'.$row['usertype'].'</td>';
          echo '<td><a href="'.$_SERVER['PHP_SELF'].'?id='.$row['id'].'">Delete</a></td>';
          echo '<td><a href="edituser.php?id='.$row['id'].'">Edit</a></td>';
          echo '</tr>';
        }
        if(!empty($_GET['id'])){
          $id = $_GET['id'];
          $delete = "DELETE FROM users WHERE id='$id'";
          $delete_result = mysqli_query($connection, $delete);
          if($delete_result){
            echo "user deleted";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';
          } else {
            echo "something went wrong";
          }
        }
        mysqli_close($connection);
      ?>
    </table>
    <?php
    } else {
      header('Location: index.php');
    }
    ?>
  </body>
</html>
