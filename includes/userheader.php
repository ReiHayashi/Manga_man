<?php include("./config/config.php"); ?>
<!-- HEADER -->
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
  <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
  <script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
  <section class="content">
    <section id="navbar">
    <nav class="navbar navbar-expand-sm py-0  bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo.svg" alt=""></a>
        <button class="navbar-toggler d-md-block d-lg-none" type="button" name="button" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="shop.php">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="sale.php">Sale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="support.php">Support</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-3">
          <input type="text" name="text" class="form-control">
        </div>
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#"><i class=" btn btn-primary fa fa-search"></i></li></a>
          <li class="nav-item"><a class="nav-link" href="cart.php"><i class=" btn btn-primary fa fa-shopping-cart"></i></li></a>
          <li class="nav-item"><a class="nav-link" href="user.php"><i class=" btn btn-primary fa fa-user"></i></li></a>
        </ul>
      </div>
    </nav>
  </section>
