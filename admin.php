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
  <a href="supportview.php"> support tickets</a> <br>
  <a href="logout.php"> emergency logout</a> <br>
  <h3>Manage Manga</h3>
  <table id="admintable">
    <tr>
      <td>Manga_id</td>
      <td>Title</td>
      <td>Genre</td>
      <td>Author</td>
      <td>Year</td>
      <td>Langauge</td>
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
        echo '<td>'.$row['language'].'</td>';
        echo '<td>'.$row['manga_price'].'</td>';
        echo '<td>';
        echo substr($row['manga_description'], 0, 200);
        echo '</td>';
        echo '<td><a href="'.$_SERVER['PHP_SELF'].'?id='.$row['manga_id'].'">Delete</a></td>';
        echo '<td><a href="editmanga.php?id='.$row['manga_id'].'">Edit</a></td>';
        echo '</tr>';
      }
      if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $delete = "DELETE FROM manga WHERE manga_id='$id'";
        $delete_result = mysqli_query($connection, $delete);
        if($delete_result){
          echo "manga deleted";
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
