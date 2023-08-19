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

            $sql2 = "INSERT INTO `admin`
            (`FName`, `MName`, `LName`, `UserName`, `Password`, `AccountType`)
            VALUES ('".$_POST['Fname']."','".$_POST['Mname']."','".$_POST['Lname']."','".$_POST['UserName']."','".$_POST['Password']."','Account')";
            $res2 = mysqli_query($con,$sql2);
            header('Location: ViewAccountant.php');
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
            <h1>Edit Students</h1>
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
      <span class="fs-4">HR Section</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ViewTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          View Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/InputTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputTeacherDetails.php"></use></svg>
          Input Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherDetails.php"></use></svg>
          Update Teacher Details
        </a>
      </li>

      <li class="nav-item">
        <a href="/DeleteTeacher.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteTeacher.php"></use></svg>
          Delete Teacher Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewStudentDetails.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentDetails.php"></use></svg>
          View Students Details
        </a>
      </li>
      <li>
        <a href="/InputStudentDetails.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Input Students Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateStudentDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateStudentDetails.php"></use></svg>
          Update Students Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/DeleteStudent.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteStudent.php"></use></svg>
          Delete Students Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewAccountant.php"></use></svg>
          View Accountant Details
        </a>
      </li>
      <li>
        <a href="/InputAccountant.php" class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputAccountant.php"></use></svg>
          Input Accountant Details
        </a>
      </li>
      <li>
        <a href="/UpdateAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateAccountant.php"></use></svg>
          Update Accountant Details
        </a>
      </li>
      <li>
        <a href="/DeleteAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteAccountant.php"></use></svg>
          Delete Accountant Details
        </a>
      </li>

      <hr>
      <li>
        <a href="/ViewLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewLibrarian.php"></use></svg>
          View Librarian Details
        </a>
      </li>
      <li>
        <a href="/InputLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputLibrarian.php"></use></svg>
          Input Librarian Details
        </a>
      </li>
      <li>
        <a href="/UpdateLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateLibrarian.php"></use></svg>
          Update Librarian Details
        </a>
      </li>
      <li>
        <a href="/DeleteLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteLibrarian.php"></use></svg>
          Delete Librarian Details
        </a>
      </li>

    </ul>
  </div>

     
    
    <form action="InputAccountant.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Enter Account Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="UserName" class="form-control" placeholder="Username">
                </div>
                <div class="col">
                    <input type="text" name="Password" class="form-control" placeholder="Password">
                </div>
            </div>
            <hr>
            <h5>Enter Accountent Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="Fname" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <input type="text" name="Mname" class="form-control" placeholder="Mid name">
                </div>
                <div class="col">
                    <input type="text" name="Lname" class="form-control" placeholder="Last name">
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
    