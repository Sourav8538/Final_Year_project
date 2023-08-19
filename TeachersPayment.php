<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <script src="js/jquery-3.6.3.js"></script>
</head>
<body>
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;">
        
        <a href="/" class="col-2 hovering" style="display: block;background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>Payment</h1>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-evenly">
            <div type="button" class="btn btn-secondary py-3 m-2"><a href="/HRLogout.php" style="text-decoration: none; color:white;"> Log&nbspOut</a></div>
        </div>

    </div>


    <main style="display:flex; flex-wrap: nowrap;height: 75vh;height: -webkit-fill-available;max-height: 100vh;overflow-x: auto;overflow-y: hidden;" >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Account Section</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ViewTeachersAccount.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          View Teachers Accounts
        </a>
      </li>
      <li class="nav-item">
        <a href="/EditTeachersAccount.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputTeacherDetails.php"></use></svg>
          Edit Teachers Accounts
        </a>
      </li>

      <li>
        <a href="/ViewStudentsAccount.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentDetails.php"></use></svg>
          View Students Accounts
        </a>
      </li>
      <li>
        <a href="/EditStudentsAccount.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Edit Students Accounts
        </a>
      </li>
      <li>
        <a href="/TeachersPayment.php" class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/TeachersPayment.php"></use></svg>
          Edit Students Accounts
        </a>
      </li>

    </ul>
    <hr>
  </div>


    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">
    <div class="row d-flex justify-content-between m-2">
        <div class="col-1 p-5" style="border-radius:20%; background-image:url(images/avatar6.png); background-repeat: no-repeat; background-size: contain;"></div>
        <div class="col-6 mx-2">
            <div class="col"><b>The Neotia Institute of Technology Management and Science</b></div>
            <div class="col-2">+1 3649-6589</div>
            <div class="col-2">company@gmail.com</div>
        </div>
    </div>
    <div class="row my-2 d-flex justify-content-between">
        <div class="col-2">
            <div class="col"><b>Teacher Name</b></div>
            <div class="col-2">Teacher Phone Number</div>
            <div class="col-2">Teacher email</div>
        </div>
        <div class="col-3">
            <div class="col-2"><h5><b>January</b></h5></div>
            <div class="col-3">
                <div class="col-2"><h6>1/11/2023&nbsp-&nbsp2/12/2023</h6></div>
            </div>
        </div>
        
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            
        </div>
    </div>
    </div>
</main>


<style>

 </style>
<?PHP
    include('Footer.php')
?>