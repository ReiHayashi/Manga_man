<?php
include("config/config.php");
if(isset($_POST['submit2'])) {
  if(!empty($_FILES['fileToUpload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileToUpload']["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      echo "Sorry, only JPG, JPEG & PNG files are allowed.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if  (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    echo "you're a faggot";
  }

  $title = $_POST['Title'];
  $price = $_POST['Price'];
  $seriess = $_POST['series'];
  $image = $_FILES["fileToUpload"]["name"];

  $query11 = "SELECT * FROM volumes ORDER BY id DESC";
  $rs = mysqli_query($connection, $query11);
  $row11 = mysqli_fetch_array($rs);
  $volumeid = $row11['id'] + 1;

  $volume = "INSERT INTO volumes (id, title, price, image)
  VALUES ('$volumeid','$title', '$price', '$image')";
  $result_volume = mysqli_query($connection, $volume);

  $seriequery = "INSERT INTO volumes_in_series (series_id, volume_id) VALUES ('$seriess', '$volumeid')";
  $result_volume2 = mysqli_query($connection, $seriequery);

  if($result_volume && $result_volume2) {
    echo "volume has been added, you will be redirected to admin panel in 5 seconds";
    header( "refresh:5;url=admin_panel.php" );

  } else {
    echo "you fucked up.";
  }
}
