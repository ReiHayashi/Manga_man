<?php
  include("config/config.php");

  $title = $_POST['Primaryname'];
  $description = $_POST['Synopsis'];
  $author = $_POST['Author'];
  $startdate = $_POST['start_date'];
  $enddate = $_POST['end_date'];

  $query11 = "SELECT * FROM series ORDER BY series_id DESC";
  $rs = mysqli_query($connection, $query11);
  $row11 = mysqli_fetch_array($rs);
  $seriesid = $row11['series_id'] + 1;

  $manga = "INSERT INTO series (series_id, primaryname, author, synopsis, start_date, end_date)
  VALUES ('$seriesid','$title', '$author', '$description', '$startdate', '$enddate')";
  $result_manga = mysqli_query($connection, $manga);

  foreach($_POST['genre'] as $g) {
    $genre = "INSERT INTO genres_in_series (genre_id, series_id) VALUES ('$g', '$seriesid')";
    $result_genre = mysqli_query($connection, $genre);
  }
  foreach($_POST['language'] as $l) {
    $language = "INSERT INTO languages_in_series (language_id, series_id) VALUES ('$l', '$seriesid')";
    $language_result = mysqli_query($connection, $language);
  }

  if($result_manga && $result_genre && $language_result) {
    echo "series have been added, you will be redirected to admin panel in 5 seconds";
    header( "refresh:5;url=admin_panel.php" );
  } else {
    echo "you fucked up btw";
  }
