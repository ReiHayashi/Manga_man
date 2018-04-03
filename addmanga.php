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
    <form action="" method="POST">
      <input type="text" name="Title" placeholder="Title" required> <br>
      <input type="text" name="Genre" placeholder="Genre" required> <br>
      <input type="text" name="Author" placeholder="Author" required> <br>
      <input type="date" name="Year" max="3000-12-31"
      min="1000-01-01" class="form-control"> <br>
      <input type="text" name="Price" value="$" required> <br>
      <select name="Language"><br>
      <option value="English">English(default)</option>
      <option value="Russian">Russian</option>
      <option value="Japanese">Japanese</option>
      <option value="French">French</option>
      </select> <br>
      <textarea name="Description" placeholder="description here max 1000 characters" required></textarea> <br>
      <input type="submit" name="submit" value="Add manga to shop" required> <br>
    </form>
    <?php
    		if(isset($_POST['Title']) && isset($_POST['Genre']) && isset($_POST['Author']) && isset($_POST['Year']) &&
          isset($_POST['Price']) && isset($_POST['Description']) && isset($_POST['Language'])) {
            $title = $_POST['Title'];
            $genre = $_POST['Genre'];
            $author = $_POST['Author'];
            $year = $_POST['Year'];
            $price = $_POST['Price'];
            $language = $_POST['Language'];
            $description = $_POST['Description'];
            $query="INSERT INTO manga (manga_name, manga_genre, manga_creator, manga_year, manga_description, language, manga_price)
            VALUES ('$title', '$genre', '$author', '$year', '$description', '$language', '$price')";
            $result = mysqli_query($connection, $query);
            if($result) {
              echo "manga has been added.";
            } else {
              echo "something went horribly wrong fuck this fucking project.";
            }
    		}
    } else {
      header('Location: index.php');
    }

    ?>
  </body>
</html>
