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
            INSERT INTO `teachers`(`username`, `password`, `branch`,
            `department`, `PhoneNo`, `Fname`, `Mname`, `Lname`, `DOJ`,
            `10thSchoolName`, `10thSchoolMarks`, `10thPasingYear`, `12thSchoolName`,
            `12thSchoolMarks`, `12thPassingYear`, `BachelorCollegeName`,
            `BachelorCollegeMarks`, `BachelorPassingYear`, `MastersCollegesName`,
            `MastersCollegesMarks`, `MastersPassingYear`, `DOB`, `VillageOrCity`,
            `PO`, `PS`, `Pin`, `Dist`, `State`, `Country`, `Gender`, `BankName`,
            `AccountNo`, `IFSC`, `BrunchCode`,`Email`, `Height`, `Weight`, `BloodGroup`, `AadharNo`, `Senior`) 
            VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['branch']."',
            '".$_POST['department']."','".$_POST['PhoneNo']."','".$_POST['Fname']."','".$_POST['Mname']."','".$_POST['Lname']."','".$_POST['DOJ']."',
            '".$_POST['10thSchoolName']."','".$_POST['10thSchoolMarks']."','".$_POST['10thPasingYear']."','".$_POST['12thSchoolName']."',
            '".$_POST['12thSchoolMarks']."','".$_POST['12thPassingYear']."','".$_POST['BachelorCollegeName']."',
            '".$_POST['BachelorCollegeMarks']."','".$_POST['BachelorPassingYear']."','".$_POST['MastersCollegesName']."',
            '".$_POST['MastersCollegesMarks']."','".$_POST['MastersPassingYear']."','".$_POST['DOB']."',
            '".$_POST['VillageOrCity']."','".$_POST['PO']."','".$_POST['PS']."','".$_POST['Pin']."','".$_POST['Dist']."','".$_POST['State']."',
            '".$_POST['Country']."','".$_POST['Gender']."','".$_POST['BankName']."','".$_POST['AccountNo']."','".$_POST['IFSC']."','".$_POST['BrunchCode']."',
            '".$_POST['Email']."','".$_POST['Height']."','".$_POST['Weight']."','".$_POST['BloodGroup']."','".$_POST['AadharNo']."','".$_POST['SeniorID']."')";
            $res = mysqli_query($con, $sql);


            $sql2 = "INSERT INTO `admin`
            (`FName`, `MName`, `LName`, `UserName`, `Password`, `AccountType`)
            VALUES ('".$_POST['Fname']."','".$_POST['Mname']."','".$_POST['Lname']."','".$_POST['username']."','".$_POST['password']."','Teacher')";
            $res2 = mysqli_query($con,$sql2);
            
            $BASIC = 120000;
            $DA = $BASIC*42/100;
            $HRA = $BASIC*40/100 ;
            $CCA = $BASIC*5/100;
            $Bonus = $BASIC*20/100;
            $TE = $BASIC+$DA+$HRA+$CCA+$Bonus;

            $PF = $BASIC*12/100;
            $ESI = $BASIC*0.8/100;
            if($TE*12<500000){
              $TDS = 0;
            }elseif($TE*12<1000000){
              $TDS = $TE*10/100;
            }elseif($TE*12<2000000){
              $TDS = $TE*15/100;
            }else{
              $TDS = $TE*20/100;
            }
            $LOP = 0;
            $EWF = $BASIC*4/100;
            $TD = $PF+$ESI+$TDS+$LOP+$EWF;
            $NP = $TE-$TD;


            $sql3 = "INSERT INTO `teacher_salary`
            (`UserName`, `Fname`, `Mname`, `Lname`, `BankName`, `AccountNumber`, `Month`,
            `Basic`, `DearnessAllowance`, `HouseRentAllowance`, `CityCompensatoryAllowance`,
            `Bonus`, `TotalEarning`, `ProvidentFund`, `EmployeesStateInsurance`,
            `TaxDeductedatSource`, `LossOfPayLeave`, `EmployeesWelfareFund`,
            `TotalDeduction`, `NetPay`) VALUES 
            ('".$_POST['username']."','".$_POST['Fname']."','".$_POST['Mname']."','".$_POST['Lname']."','".$_POST['BankName']."',
            '".$_POST['AccountNo']."','".date('m')."','".$BASIC."','".$DA."','".$HRA."',
            '".$CCA."','".$Bonus."','".$TE."','".$PF."','".$ESI."','".$TDS."',
            '".$LOP."','".$EWF."','".$TD."','".$NP."')";
            $res3 = mysqli_query($con,$sql3);

            header('Location: ViewTeacherDetails.php');
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
        <a href="/ViewTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          View Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/InputTeacherDetails.php" class="nav-link active" aria-current="page">
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
        <a href="/InputAccountant.php" class="nav-link link-dark">
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

    
    <form action="InputTeacherDetails.php" method="post">
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
            <h5>Enter Personal Details</h5>
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
            <div class="row m-2">
                <div class="col d-flex">
                    Date&nbspof&nbspBirth:&nbsp<input type="Date" name="DOB" class="form-control" placeholder="Date Of Birth">
                </div>
                <div class="col">
                    <select name="Gender" class="form-select">
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col">
                    <input type="number" name="PhoneNo"  class="form-control" placeholder="PhoneNo">
                </div>
                
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="email" name="Email"  class="form-control" placeholder="Email">
                </div>
                <div class="col">
                    <input type="text" name="Brunch"  class="form-control" placeholder="Brunch">
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="number" name="Height" step="0.01" class="form-control" placeholder="Height">
                </div>
                <div class="col">
                    <input type="number" name="Weight" step="0.01" class="form-control" placeholder="Weight">
                </div>
                <div class="col">
                    <select name="BloodGroup" class="form-select">
                        <option selected>Select Blood Group</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="number" name="AadharNo"  class="form-control" placeholder="Aadhar Number" min="100000000000" max="999999999999">
                </div>
            </div>

            <hr>
            <h5>Enter Education Details</h5>
            
            <div class="row m-2">
                <div class="col"><h6>10th Details</h6></div>
                <div class="col">
                    <input type="text" name="10thSchoolName" class="form-control" placeholder="10th School Name">
                </div>
                <div class="col">
                    <input type="number" name="10thSchoolMarks" class="form-control" placeholder="10th Marks">
                </div>
                <div class="col">
                    <input type="date" name="10thPasingYear" class="form-control" placeholder="10th passing year">
                </div>
            </div>

            <div class="row m-2">
                <div class="col"><h6>12th Details</h6></div>
                <div class="col">
                    <input type="text" name="12thSchoolName" class="form-control" placeholder="12th School Name">
                </div>
                <div class="col">
                    <input type="number" name="12thSchoolMarks" class="form-control" placeholder="12th Marks">
                </div>
                <div class="col">
                    <input type="date" name="12thPassingYear" class="form-control" placeholder="12th passing year">
                </div>
            </div>
            <div class="row m-2">
                <div class="col"><h6>Bachlors Details</h6></div>
                <div class="col">
                    <input type="text" name="BachelorCollegeName" class="form-control" placeholder="Bachelors college Name">
                </div>
                <div class="col">
                    <input type="number" name="BachelorCollegeMarks" class="form-control" placeholder="Bachelors Marks">
                </div>
                <div class="col">
                    <input type="date" name="BachelorPassingYear" class="form-control" placeholder="Bachelors passing year">
                </div>
            </div>
            <div class="row m-2">
                <div class="col"><h6>Masters Details</h6></div>
                <div class="col">
                    <input type="text" name="MastersCollegesName" class="form-control" placeholder="Masters college Name">
                </div>
                <div class="col">
                    <input type="number" name="MastersCollegesMarks" class="form-control" placeholder="Masters Marks">
                </div>
                <div class="col">
                    <input type="date" name="MastersPassingYear" class="form-control" placeholder="Masters passing year">
                </div>
            </div>
            <hr>
            <h5>Enter Address Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="VillageOrCity" class="form-control" placeholder="Village/City">
                </div>
                <div class="col">
                    <input type="text" name="PO" class="form-control" placeholder="Post Office">
                </div>

    
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="PS" class="form-control" placeholder="Police Station">
                </div>
                <div class="col">
                    <input type="text" name="Pin" class="form-control" placeholder="Pin Code">
                </div>
            </div> 
            <div class="row m-2">
                    <div class="col">
                        <input type="text" name="Dist" class="form-control" placeholder="District">
                    </div>
                    <div class="col">
                        <input type="text" name="State" class="form-control" placeholder="State">
                    </div>
                    <div class="col">
                        <input type="text" name="Country" class="form-control" placeholder="Country">
                    </div>
            </div> 
            <hr>
            <h5>Enter Job Details</h5>
            <div class="row">
                <div class="col">
                    <input type="text" name="branch" class="form-control" placeholder="Branch">
                </div>
                <div class="col">
                    <input type="text" name="department" class="form-control" placeholder="Department">
                </div>
                <div class="col">
                    <input type="date" name="DOJ" class="form-control" placeholder="Date of joining">
                </div>

                <div class="col">
                    <input type="text" name="SeniorID" class="form-control" placeholder="Enter Senior ID">
                </div>
            </div>
            <hr>

            <h5>Enter Bank Details</h5>
            <div class="row">
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
    