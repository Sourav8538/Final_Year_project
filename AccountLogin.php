<?php
// Start the session
session_start();
?>

<?php
  $con=mysqli_connect("localhost","root","","authentication");
  $sql = "SELECT * FROM admin where AccountType='Account'";
  if($res = $con->query($sql)){
    if(isset($_SESSION['ACCusername']) && isset($_SESSION['ACCpassword'])){
      $sql = "SELECT * FROM admin WHERE AccountType='Account' && UserName='".$_SESSION['ACCusername']."' && Password='".$_SESSION['ACCpassword']."'";
      $res = $con->query($sql);
      if($res->num_rows > 0){
        header('Location: ViewTeachersAccount.php');
      }else{
        if (isset($_POST['login']) && (empty($_POST['username']) or empty($_POST['password']))){
          echo '<div class="p-2 d-flex justify-content-center bg-danger" style="width:100%;color: white;">';
            echo '<div class="col-2 m-2"><h5>Enter&nbspvalid&nbspUsername</h5></div>';
            echo '<div class="col-2 m-2"><h5>Enter&nbspvalid&nbspPassword</h5></div>';
          echo '</div>';
        }
        if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
          $sql = "SELECT * FROM admin WHERE AccountType='Account' && UserName='".$_POST['username']."' && Password='".$_POST['password']."'";
          $res = $con->query($sql);
          if($res->num_rows > 0){
              $_SESSION['ACCusername'] = $_POST['username'];
              $_SESSION['ACCpassword'] = $_POST['password'];
              header('Location: ViewTeachersAccount.php');
          }else{
              echo '<div class=" p-2 d-flex justify-content-center bg-danger" style="width:100%;color: white;">';
                echo '<div class="col-2"><h5>No user Found!</h5></div>';
              echo '</div>';
            }
          }
      }
      
    }else{
    if (isset($_POST['login']) && (empty($_POST['username']) or empty($_POST['password']))){
      echo '<div class=" p-2 d-flex justify-content-center bg-danger" style="width:100%;color: white;">';
        echo '<div class="col-2 m-2"><h5>Enter&nbspvalid&nbspUsername</h5></div>';
        echo '<div class="col-2 m-2"><h5>Enter&nbspvalid&nbspPassword</h5></div>';
      echo '</div>';
    }
    if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
      $sql = "SELECT * FROM admin WHERE AccountType='Account' && UserName='".$_POST['username']."' && Password='".$_POST['password']."'";
      $res = $con->query($sql);
      if($res->num_rows > 0){
          $_SESSION['ACCusername'] = $_POST['username'];
          $_SESSION['ACCpassword'] = $_POST['password'];
          header('Location: ViewTeachersAccount.php');
      }else{
          echo '<div class=" p-2 d-flex justify-content-center bg-danger" style="width:100%;color: white;">';
          echo '<div class="col-2"><h5>No user Found!</h5></div>';
          echo '</div>';
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
</head>
<body>
    <div class="d-flex justify-content-between bg-dark p-1 " style="color:white;">
        <a href="/" class="col-2 hovering" style="display: block;background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>Login to Account Section</h1>
        </div>
        <div class="col-2 p-5 ">
        </div>


    </div>
    
    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img class="img-fluid" src="/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form class="content" method="POST" action="">
         

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="username" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />

          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />

          </div>

          <!-- <div class="d-flex justify-content-between align-items-center">

            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" name="remember" value="1" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div> -->
            <hr>
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="login" value="login" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>

<style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }
    }

    .hovering:hover{
    opacity: 0.5 !important;
    transition: 0.3s;
    }

</style>