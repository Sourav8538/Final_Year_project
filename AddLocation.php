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
  if(isset($_POST['Filter']))
  {
    
  }else{
    session_start();
    if(isset($_POST['confirm'])){
    if($_POST['confirm']=='Confirm'){
        $con=mysqli_connect("localhost","root","","authentication");
        $sql2="INSERT INTO `locations`
        (`Latitude`, `Longtitude`, `starttime`, `endtime`) VALUES 
        ('".$_POST['Latitude']."','".$_POST['Longitude']."','".$_POST['starttime']."','".$_POST['endtime']."')";                    
        
        $req = mysqli_query($con, $sql2);
            
            // header('Location: ViewStudentsAccount.php');
        }else{
            echo '<div class="p-2 d-flex justify-content-center bg-danger" style="color: white;">';
                echo "<div class='col-2'><h5>Type&nbsp'Confirm'&nbspto&nbspcontinue!</h5></div>";
            echo '</div>';
        }
    
    }}
    ?>
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;">
        
        <a href="/" class="col-2 hovering" style="display: block; background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>Enter Attandence</h1>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-evenly">
            <div type="button" class="btn btn-secondary py-3 m-2"><a href="/Logout.php" style="text-decoration: none; color:white;"> Log&nbspOut</a></div>
        </div>

    </div>

    <form action="/AddLocation.php" method="POST">
    <main style="display:flex; " >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
          <a href="/SelfAttandence2.php" class="nav-link link-dark" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/SelfAttandence2.php"></use></svg>
            Attendance
          </a>
      </li>
      <li class="nav-item">
          <a href="/AddLocation.php" class="nav-link active" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/AddLocation.php"></use></svg>
            Add Location
          </a>
      </li>
      <li class="nav-item">
        <a href="/Attandence.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          Student Attendance
        </a>
      </li>
      <li class="nav-item">
        <a href="/BooksTeacher.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputTeacherDetails.php"></use></svg>
          Books
        </a>
      </li>

      <li>
        <a href="/EditMarks.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentDetails.php"></use></svg>
          Edit Marks
        </a>
      </li>
      <li>
        <a href="/Sallary.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Salary
        </a>
      </li>
      <li>
        <a href="/TeacherLeaves.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Leaves
        </a>
      </li>


    </ul>
    <hr>
  </div>

    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">
    
    <h5>Enter Location Details</h5>
    <div class="row m-2">
        <div class="col"><h6>Enter Location</h6></div>
        <div class="col">
            <input type="text" name="Latitude" class="form-control" placeholder="Latitude">
        </div>
        <div class="col">
            <input type="text" name="Longitude" class="form-control" placeholder="Longitude">
        </div>
    </div>
    <hr>

    <h5>Enter Time Details</h5>
    <div class="row m-2">
        <div class="col"><h6>Enter Starting Time</h6></div>
        <div class="col">
            <input type="text" name="starttime" class="form-control" placeholder="Starting Time">
        </div>
    </div>
    
    
    <div class="row m-2">
        <div class="col"><h6>Enter Ending Time</h6></div>
        <div class="col">
            <input type="text" name="endtime" class="form-control" placeholder="Ending Time">
        </div>
    </div>

        <div class="mt-1">
            <input type="text" class="form-control" name="confirm" id="inputPassword2" placeholder='Type "Confirm" to continue'>
        </div>
        <input class="btn btn-primary mt-3 p-2"  type="submit" value="Submit">
    </div>
    </main>
</form>

<?PHP
    include('Footer.php')
?>
    