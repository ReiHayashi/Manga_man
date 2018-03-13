<?php include("config/config.php"); ?>
<!-- NAVBAR -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manga Man</title>
  <link rel="icon" href="img/shop.png">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-sm py-0  bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="img/logo.svg"width="300" height="70" alt=""></a>
          <ul class="navbar-nav">
              <li class="nav-item ml-5">
                  <a class="nav-link" href="#">Shop</a>
              </li>
              <li class="nav-item ml-3">
                  <a class="nav-link" href="#">Sale</a>
              </li>
              <li class="nav-item ml-3">
                  <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item ml-3">
                  <a class="nav-link" href="#">Support</a>
              </li>
              <?php
              session_start();
              if($_SESSION['aaa'] === 'admin') {?>
              <li class="nav-item ml-3">
                <a class="nav-link" href="admin.php">temp admin button</a>
              </li>
            <?php } else {} ?>
          </ul>
          <ul class="navbar-nav float-right">
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-search"></i></li></a>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-shopping-cart mx-3"></i></li></a>
            <li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-user"></i></li></a>
          </ul>
      </div>
</nav>
