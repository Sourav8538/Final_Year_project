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


    <main style="display:flex; flex-wrap: nowrap;" >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Account Section</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <li class="nav-item">
            <a href="/SelfAttandence.php" class="nav-link link-dark" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="/SelfAttandence.php"></use></svg>
                Self Attandence
            </a>
        </li>
        <a href="/Attandence.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          Student Attandence
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
        <a href="/Sallary.php" class="nav-link active">
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


    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 1000px;">
    <div class="row d-flex justify-content-between m-2">
        <div class="col-1 p-5" style="border-radius:20%; background-image:url(images/avatar6.png); background-repeat: no-repeat; background-size: contain;"></div>
        <div class="col-8 mx-2">
            <div class="col"><b>The Neotia Institute of Technology Management and Science</b></div>
            <div class="row d-flex justify-context-reverse">
              <div class="col">+1 3649-6589</div>
              <div class="col">company@gmail.com</div>
            </div>
        </div>
    </div>
    <?php
    session_start();
    $con=mysqli_connect("localhost","root","","authentication");
    $sql = "SELECT * FROM teacher_salary where UserName='".$_SESSION['Tusername']."' limit 1"; 
    $res = mysqli_query($con, $sql);
    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){
            while($row = $res->fetch_array()){
    echo '
    <div class="row d-flex justify-content-center">
    <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div> <span class="fw-bolder">Teacher Id</span> <small class="ms-3">'.$row['UserName'].'</small> </div>
                        </div>
                        <div class="col-md-4">
                            <div> <span class="fw-bolder">Teacher Name</span> <small class="ms-3">'.$row['Fname'].' '.$row['Mname'].' '.$row['Lname'].'</small> </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div> <span class="fw-bolder">Bank Name</span> <small class="ms-3">'.$row['BankName'].'</small> </div>
                        </div>
                        <div class="col-md-4">
                            <div> <span class="fw-bolder">Account Number</span> <small class="ms-3">'.$row['AccountNumber'].'</small> </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div> <span class="fw-bolder"><h5><b>Payment Month</b></h5></span></div>
                        </div>
                        <div class="col-md-4">
                            <div> <span class="fw-bolder">'.date('m-01-Y',strtotime("-1 Months")).' / '.date('m-t-Y',strtotime("-1 Months")).'</span></div>
                        </div>
                    </div>
                </div>
                <table class="mt-4 table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">Earnings</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Deductions</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Basic</th>
                            <td>'.$row['Basic'].'</td>
                            <td>Provident Fund</td>
                            <td>'.$row['ProvidentFund'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">Dearness allowance</th>
                            <td>'.$row['DearnessAllowance'].'</td>
                            <td>Employees State Insurance</td>
                            <td>'.$row['DearnessAllowance'].'</td>
                        </tr>
                        <tr>
                            <th scope="row">House Rent Allowance</th>
                            <td>'.$row['HouseRentAllowance'].'</td>
                            <td>Tax Deducted at Source</td>
                            <td>'.$row['TaxDeductedatSource'].'</td>
                        </tr>

                        <tr>
                            <th scope="row">City Compensatory Allowance</th>
                            <td>'.$row['CityCompensatoryAllowance'].'</td>
                            <td>Loss Of Pay Leave</td>
                            <td>'.$row['LossOfPayLeave'].'</td>
                        </tr>

                        <tr>                            
                            <th scope="row">Bonus</th>
                            <td>'.$row['Bonus'].'</td>
                            <td>Employees Welfare Fund</td>
                            <td>'.$row['EmployeesWelfareFund'].'</td>
                        </tr>
                        <tr class="border-top">
                            <th scope="row">Total Earning</th>
                            <td>'.$row['TotalEarning'].'</td>
                            <td>Total Deductions</td>
                            <td>'.$row['TotalDeduction'].'</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align:center;"> <br> <h5>Net Pay : '.$row['NetPay'].'</h5> </div>
            </div>
        </div>
    </div>
    </div>
    </div>';
    }}}
?>
    </div>

</main>


<style>

 </style>
<?PHP
    include('Footer.php')
?>