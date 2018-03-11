<?php include("config/config.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>add manga</title>
  </head>
  <body>
    <?php
    require_once("login.php");
    if($_SESSION['aaa'].equals('admin') === true) {
    ?>
    <form action="addmange.php" method="POST">
      <input type="text" name="Title" placeholder="Title" required>
      <input type="text" name="Genre" placeholder="Genre" required>
      <input type="text" name="Author" placeholder="Author" required>
      <input type="number" name="Year" value="2000" min="1900" max="2099" required>
      <input type="text" name="Price" placeholder="Price" required>
      <input type="textarea" name="Description" placeholder="description here max 1000 characters" required>
      <input type="submit" name="submit" value="Add manga to store" required>
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

    		}
    } else {
      header('Location: index.php');
    }

    ?>
  </body>
</html>
