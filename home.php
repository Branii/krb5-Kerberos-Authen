<?php 
ini_set('display_errors',0);
require "./config/Database.php";
require "./model/Model.php";
require "controller/Controller.php";
(new Controller)->checkSessionunSet();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Kerb 5 Auth</title>
  </head>
  <body>
  
  <nav class="navbar navbar-icon-top navbar-expand-lg" style="background-color:#fff;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
  <a class="navbar-brand text-black" href="#">Kerberos Example</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-bell">
            <span class="badge badge-info time"></span>
          </i>
          
        </a>
      </li>
      
    </ul>
    <ul class="navbar-nav ">

     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        <?=isset($_SESSION['username']) ? $_SESSION['username'] : "...";?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="password.php">Password</a> -->
          <a class="dropdown-item" href="execute/execute_signout.php">Signout</a>
          <div class="dropdown-divider"></div>
          <!-- <a class="dropdown-item" href="#">About</a> -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          
        </a>
      </li>
      
    </ul>
  </div>
</nav>
<br><br>
  <div class="d-md-flex half">
    <!-- <div class="bg" style="background-image: url('assets/images/bg_1.jpg');"></div> -->

        <div class="row d-flex justify-content-center">
          <?php

          for($x = 0; $x < 12; $x++){

            ?>


<div class="a-box">
  <div class="img-container">
    <div class="img-inner">
      <center>
      <div class="inner-skew">
        <img src="assets/images/pdf.png">
      </div>
    </center>
    </div>
  </div>
  <div class="text-container">
    <h3>Sample File (5kb)</h3>
    <div>
      <a href="assets/file.pdf"><button class="btn btn-sm ">Open</button></a>
  </div>
</div>
</div>


            <?php
          }
          
          ?>
        </div>
    
  </div>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/signin.js"></script>
  </body>
  <style>

.a-box {
    display: inline-block;
    width: 200px;
    margin:10px;
    text-align: center;
}

.img-container {
    height: 170px;
    width: 200px;
    overflow: hidden;
    border-radius: 0px 0px 20px 20px;
    display: inline-block;
}

.img-container img {
    /* transform: skew(0deg, -13deg); */
    height: 100px;
    
}

.inner-skew {
 
    border-radius: 20px;
    overflow: hidden;
    padding: 50px;
    font-size: 0px;
    background: #eee;
   
}

.text-container {
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
    padding: 120px 20px 20px 20px;
    border-radius: 20px;
    background: #fff;
    margin: -120px 0px 0px 0px;
    line-height: 19px;
    font-size: 14px;
}

.text-container h3 {
    margin: 20px 0px 10px 0px;
    color: #04bcff;
    font-size: 18px;
}

  </style>
</html>