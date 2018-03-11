<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>add manga</title>
  </head>
  <body>
    <?php
    session_start();
      if($_SESSION['aaa'] === 'admin') {
    ?>
    <form action="addmanga.php" method="POST">
      <input type="text" name="Title" placeholder="Title" required> <br>
      <input type="text" name="Genre" placeholder="Genre" required> <br>
      <input type="text" name="Author" placeholder="Author" required> <br>
      <input type="number" name="Year" value="2000" min="1900" max="2099" required> <br>
      <input type="text" name="Price" placeholder="Price" required> <br>
      <input type="textarea" name="Description" placeholder="description here max 1000 characters" required> <br>
      <input type="submit" name="submit" value="Add manga to store" required> <br>
    </form>
    <?php
    		if(isset($_POST['Title']) && isset($_POST['Genre']) && isset($_POST['Author']) && isset($_POST['Year']) &&
          isset($_POST['Price']) && isset($_POST['Description'])) {
            $title = $_POST['Title'];
            $genre = $_POST['Genre'];
            $author = $_POST['Author'];
            $year = $_POST['Year'];
            $price = $_POST['Price'];
            $description = $_POST['Description'];
            $query="INSERT INTO manga (manga_name, manga_genre, manga_creator, manga_year, manga_description, manga_price)
            VALUES ('$title', '$genre', '$author', '$year', '$description', '$price')";
            $result = mysqli_query($connection, $query);
            if($result) {
              echo "user created successfully.";
            } else {
              echo "user registration failed";
            }
    		}
    } else {
      header('Location: index.php');
    }

    ?>
  </body>
</html>
