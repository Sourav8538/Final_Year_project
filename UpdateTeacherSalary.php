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
    session_start();
    if(isset($_POST['confirm'])){
        if($_POST['confirm']=='Confirm'){

            $con=mysqli_connect("localhost","root","","authentication");
            $sql = "UPDATE `teacher_salary` SET `UserName`='".$_POST['UserName']."',`Fname`='".$_POST['Fname']."',
            `Mname`='".$_POST['Mname']."',`Lname`=`Lname`='".$_POST['Lname']."',`BankName`='".$_POST['BankName']."',`AccountNumber`='".$_POST['AccountNo']."',
            `Month`='".$_POST['Month']."',`Basic`='".$_POST['Basic']."',`DearnessAllowance`='".$_POST['DearnessAllowance']."',
            `HouseRentAllowance`='".$_POST['HouseRentAllowance']."',`CityCompensatoryAllowance`='".$_POST['CityCompensatoryAllowance']."',
            `Bonus`='".$_POST['Bonus']."',`TotalEarning`='".$_POST['TotalEarning']."',`ProvidentFund`='".$_POST['ProvidentFund']."',
            `EmployeesStateInsurance`='".$_POST['EmployeesStateInsurance']."',`TaxDeductedatSource`='".$_POST['TaxDeductedatSource']."',
            `LossOfPayLeave`='".$_POST['LossOfPayLeave']."',`EmployeesWelfareFund`='".$_POST['EmployeesWelfareFund']."',
            `TotalDeduction`='".$_POST['TotalDeduction']."',`NetPay`='".$_POST['NetPay']."' WHERE UserName='".$_POST['UserName']."'";
            $res = mysqli_query($con, $sql);


            // header('Location: ViewTeacherDetails.php');
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
      <span class="fs-4">HR Section</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ViewTeachersAccount.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherAccount.php"></use></svg>
          View Teacher Accounts
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateTeachersAccount.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherAccount.php"></use></svg>
          Input Teacher Accounts
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateTeacherSalary.php" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherSalary.php"></use></svg>
          Update Teacher Salary
        </a>
      </li>
      <li>
        <a href="/ViewStudentsAccount.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentAccount.php"></use></svg>
          View Student Accounts
        </a>
      </li>
      <li>
        <a href="/UpdateStudentsAccount.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateStudentAccount.php"></use></svg>
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
  </div>
<?php
    if(isset($_POST["username"])){
        if($_POST["username"]=='' and $_POST["password"]==''){
            echo '<form action="UpdateTeacherSalary.php" method="post">
                <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
                    <h5>Enter Account Details</h5>
                    <div class="row m-2">
                        <div class="col">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>

                        <div class="col">
                            <input class="btn btn-primary p-1" type="submit" value="Search">
                        </div>
                    </div>
                </div>

                </form>';
        }else{
    $con=mysqli_connect("localhost","root","","authentication");
    $sql2 = "SELECT * FROM teacher_salary where username='".$_POST['username']."' ";
    $req2 = mysqli_query($con, $sql2);
    $res2 = $con->query($sql2);
    while($row2 = $res2->fetch_array()){
    echo '
    <form action="UpdateTeacherSalary.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Account Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="UserName" value="'.$row2['UserName'].'" class="form-control" placeholder="Username">
                </div>

                <div class="col">
                    <input class="btn btn-primary p-1" type="submit" value="Search">
                </div>
            </div>
            <hr>
            <h5>Personal Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="Fname" value="'.$row2['Fname'].'" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <input type="text" name="Mname" value="'.$row2['Mname'].'" class="form-control" placeholder="Mid name">
                </div>
                <div class="col">
                    <input type="text" name="Lname" value="'.$row2['Lname'].'" class="form-control" placeholder="Last name">
                </div>
            </div>
            <hr>
            <h5>Bank Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="BankName" value="'.$row2['BankName'].'" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col">
                    <input type="text" name="AccountNo" value="'.$row2['AccountNumber'].'" class="form-control" placeholder="Account Number">
                </div>
                <div class="col">
                    <input type="text" name="Month" value="'.$row2['Month'].'" readonly="readonly" class="form-control" placeholder="IFSC Code">
                </div>
            </div>
            <hr>
            <h5>Sallary Details</h5>
            <h6>Earnings</h6>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="Basic" value="'.$row2['Basic'].'" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col">
                    <input type="text" name="DearnessAllowance" value="'.$row2['DearnessAllowance'].'" class="form-control" placeholder="Account Number">
                </div>
                <div class="col">
                    <input type="text" name="HouseRentAllowance" value="'.$row2['HouseRentAllowance'].'" class="form-control" placeholder="IFSC Code">
                </div>
                <div class="col">
                    <input type="text" name="CityCompensatoryAllowance" value="'.$row2['CityCompensatoryAllowance'].'" class="form-control" placeholder="IFSC Code">
                </div>
                <div class="col">
                    <input type="text" name="Bonus" value="'.$row2['Bonus'].'"  class="form-control" placeholder="IFSC Code">
                </div>
            </div>
            <div class="row m-2 d-flex justify-content-center">
                <div class="col-8">
                    <input type="text" name="TotalEarning" value="'.$row2['TotalEarning'].'"  class="form-control" placeholder="IFSC Code">
                </div>
            </div>
            <hr>
            <h6>Deductions</h6>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="ProvidentFund" value="'.$row2['ProvidentFund'].'" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col">
                    <input type="text" name="EmployeesStateInsurance" value="'.$row2['EmployeesStateInsurance'].'" class="form-control" placeholder="Account Number">
                </div>
                <div class="col">
                    <input type="text" name="TaxDeductedatSource" value="'.$row2['TaxDeductedatSource'].'" class="form-control" placeholder="IFSC Code">
                </div>
                <div class="col">
                    <input type="text" name="LossOfPayLeave" value="'.$row2['LossOfPayLeave'].'" class="form-control" placeholder="IFSC Code">
                </div>
                <div class="col">
                    <input type="text" name="EmployeesWelfareFund" value="'.$row2['EmployeesWelfareFund'].'"  class="form-control" placeholder="IFSC Code">
                </div>
            </div>
            <div class="row m-2 d-flex justify-content-center">
                <div class="col-8">
                    <input type="text" name="TotalDeduction" value="'.$row2['TotalDeduction'].'"  class="form-control" placeholder="IFSC Code">
                </div>
            </div>
            <hr>
            <div class="row m-2 d-flex justify-content-center">
                <div class="col-8">
                    <span><b>Net Pay:</b><span>
                    <input type="text" name="NetPay" value="'.$row2['NetPay'].'"  class="form-control" placeholder="IFSC Code">
                </div>
            </div>
        <div class="mt-5">
            <input type="text" name="confirm" class="form-control" id="inputPassword2" placeholder="Type Confirm to continue">
        </div>
            <input class="btn btn-primary mt-3 p-2" type="submit" value="Submit">
        </div>
    </form>';
    }}
    }else{
        echo '<form action="UpdateTeacherSalary.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Enter Account Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="col">
                    <input class="btn btn-primary p-1" type="submit" value="Search">
                </div>
            </div>
        </div>

        </form>';
    }
?>
    </main>
<?PHP
    include('Footer.php')
?>
    