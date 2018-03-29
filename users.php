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
          echo '<td><a href="deleteuser.php?id='.$row['id'].'">Delete</a></td>';
          echo '<td><a href="edituser.php?id='.$row['id'].'">Edit</a></td>';
          echo '</tr>';
        }
      ?>
    </table>
    <?php
    } else {
      header('Location: index.php');
    }
    ?>
  </body>
</html>
