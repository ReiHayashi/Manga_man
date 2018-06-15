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
      <nav class="navbar navbar-expand-lg py-0 bg-dark navbar-toggleable-md navbar-inverse bg-inverse">
        <div class="container">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsenavbar" aria-controls="collapsenavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-align-justify"></span>
        </button>
          <a class="navbar-brand" href="index.php"><img src="img/logo.svg"width="250" height="60" alt=""></a>
          <div class="collapse navbar-collapse" id="collapsenavbar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sale.php">Sale</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
            </ul>
        </div>
        <form action="search.php" method="POST">
      <div class="input-group mt-3">
        <input type="text" name="search" class="form-control" placeholder="Search manga">
        <div class="input-group-append">
        <button class="btn btn-sm btn-primary fa fa-search" type="submit" name="submit-search"></button>
        </div>
      </div>
      </form>
          <div class="mx-3">
          <a href="login.php"><button class="btn btn-sm btn-primary fa fa-user"></button></a>
        </div>
    </nav>
  </section>
