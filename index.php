<?php 
ini_set('display_errors',0);
require "./config/Database.php";
require "./model/Model.php";
require "controller/Controller.php";
(new Controller)->checkSessionSet();
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
  

  <div class="d-md-flex half">
    <!-- <div class="bg" style="background-image: url('assets/images/bg_1.jpg');"></div> -->

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
              <h3>SSO Login</h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="username">Email Address</label>
                  <input type="text" class="form-control" placeholder="your-email@gmail.com" id="email" autocomplete="off">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password" autocomplete="off">
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" value="Log In" class="submit btn btn-block btn-primary">

              </form>
              <center>
                <br>
              <p>Don't have an account? <b><a href="register.php">Register</a></b></p>
              </center>
            </div>
          </div>
        </div>
      </div>

    
  </div>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/signin.js"></script>
    <script>
        $(function(){
            $.post("execute/execute_verify.php",(data)=>{
              console.log(data)
                data == "true" ?window.location.href = "oauth.php" : "";
            })
        });
    </script>
  </body>
</html>