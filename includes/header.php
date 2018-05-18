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
</head>
<body>
  <section class="content">
    <section id=navbar>
      <nav class="navbar navbar-expand-sm py-0  bg-dark">
        <div class="container">
          <a class="navbar-brand" href="index.php"><img src="img/logo.svg"width="250" height="60" alt=""></a>
          <button class="navbar-toggler" type="button" name="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-3" href="sale.php">Sale</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <form action="search.php" method="POST">
            <input type="text" name="search" class="form-control">
          </div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <button class="nav-link btn btn-primary fa fa-search mx-4" type="submit" name="submit-search"></button>
            </li>
          </form>
            <li class="nav-item">
              <a href="login.php"><button class="nav-link btn btn-primary fa fa-user"></button></a>
            </li>
        </ul>
      </div>
    </nav>
  </section>
