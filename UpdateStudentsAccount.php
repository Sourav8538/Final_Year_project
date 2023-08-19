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
<?php
    if(isset($_POST['confirm'])){
        if($_POST['confirm']=='Confirm'){
            // Check all the variables
            // if(){

            // }
            $con=mysqli_connect("localhost","root","","authentication");
            $sql = "
            UPDATE `students` SET `BankName`='".$_POST['BankName']."',`AccountNo`='".$_POST['AccountNo']."',
            `IFSC`='".$_POST['IFSC']."',`BrunchCode`='".$_POST['BrunchCode']."' where `username`='".$_POST['username']."'";
            $res = mysqli_query($con, $sql);
            header('Location: ViewStudentsAccount.php');
        }else{
            echo '<div class="p-2 d-flex justify-content-center bg-danger" style="color: white;">';
                echo "<div class='col-2'><h5>Type&nbsp'Confirm'&nbspto&nbspcontinue!</h5></div>";
            echo '</div>';
        }
    }
?>
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;">
        
        <a href="/" class="col-2 hovering" style="display: block;background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>Edit Teacher</h1>
        </div>
        <a href="/Logout.php" style="text-decoration: none; color:white;">
          <div class="col-2 d-flex align-items-center justify-content-evenly">
              <div type="button" class="btn btn-secondary py-3 m-2"> Log&nbspOut</div>
          </div>
        </a>

    </div>


    <main style="display:flex; overflow-y: hidden;" >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Account Section</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/ViewTeachersAccount.php" class="nav-link link-dark" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeachersAccount.php"></use></svg>
            View Teacher Accounts
            </a>
        </li>
        <li class="nav-item">
            <a href="/UpdateTeachersAccount.php" class="nav-link link-dark" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeachersAccount.php"></use></svg>
            Input Teacher Accounts
            </a>
        </li>
        <li class="nav-item">
        <a href="/UpdateTeacherSalary.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherSalary.php"></use></svg>
          Update Teacher Salary
        </a>
      </li>
        <li>
            <a href="/ViewStudentsAccount.php" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentsAccount.php"></use></svg>
            View Student Accounts
            </a>
        </li>
        <li>
            <a href="/UpdateStudentsAccount.php" class="nav-link active">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateStudentsAccount.php"></use></svg>
            Input Student Accounts
            </a>
        </li>
        <li>
            <a href="/InputStudentFees.php" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentFees.php"></use></svg>
            Update Student Fees
            </a>
        </li>

        </ul>
        <hr>
    </div>

    
    <form action="UpdateStudentsAccount.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Enter Account Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="col">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
            </div>

            <h5>Enter Bank Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="BankName" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col">
                    <input type="text" name="AccountNo" class="form-control" placeholder="Account Number">
                </div>
                <div class="col">
                    <input type="text" name="IFSC" class="form-control" placeholder="IFSC Code">
                </div>
                <div class="col">
                    <input type="text" name="BrunchCode" class="form-control" placeholder="Brunch Code">
                </div>
            </div>

            <hr>

        <div class="mt-5">
            <input type="text" name="confirm" class="form-control" id="inputPassword2" placeholder="Type 'Confirm' to continue">
        </div>
            <input class="btn btn-primary mt-3 p-2" type="submit" value="Submit">
        </div>
    </form>
        
    </main>
<?PHP
    include('Footer.php')
?>
    