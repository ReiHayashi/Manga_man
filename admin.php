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
    <a href="addmanga.php"> add manga </a> <br>
    <a href="users.php"> manage users </a> <br>
    <a href="admin.php"> admin page</a> <br>
    <a href="logout.php"> emergency logout</a> <br>
    <h3>Manage Manga</h3>
    <table id="admintable">
      <tr>
        <td>Manga_id</td>
        <td>Title</td>
        <td>Genre</td>
        <td>Author</td>
        <td>Year</td>
        <td>Price</td>
        <td>Description</td>
        <td>Delete</td>
        <td>Edit</td>
      </tr>
      <?php
        $manga='SELECT * FROM manga ORDER BY manga_id DESC';
        $query = mysqli_query($connection,$manga);
        while ($row = mysqli_fetch_array($query)) {
          echo '<tr>';
          echo '<td>'.$row['manga_id'].'</td>';
          echo '<td>'.$row['manga_name'].'</td>';
          echo '<td>'.$row['manga_genre'].'</td>';
          echo '<td>'.$row['manga_creator'].'</td>';
          echo '<td>'.$row['manga_year'].'</td>';
          echo '<td>'.$row['manga_price'].'</td>';
          echo '<td>';
          echo substr($row['manga_description'], 0, 100);
          echo '</td>';
          echo '<td><a href="deletemanga.php?id='.$row['manga_id'].'">Delete</a></td>';
          echo '<td><a href="editmanga.php?id='.$row['manga_id'].'">Edit</a></td>';
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
