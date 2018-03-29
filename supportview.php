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
    <h3>support tickets</h3>
    <table id="admintable">
      <tr>
        <td>Id</td>
        <td>firstname</td>
        <td>lastname</td>
        <td>email</td>
        <td>problem</td>
      </tr>
      <?php
        $user='SELECT * FROM support ORDER BY support_id DESC';
        $query = mysqli_query($connection,$user);
        while ($row = mysqli_fetch_array($query)) {
          echo '<tr>';
          echo '<td>'.$row['support_id'].'</td>';
          echo '<td>'.$row['firstname'].'</td>';
          echo '<td>'.$row['lastname'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>';
          echo substr($row['problem'], 0, 100);
          echo '</td>';
          echo '<td><a href="deleteticket.php?id='.$row['support_id'].'">Delete</a></td>';
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
